<?php

/**
 * Neural network perceptron classifier.
 *
 * PHP version 8.2
 *
 * @category NeuralNetworks
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

namespace NeuralNetworks\PerceptronClassifier;

/**
 * This class implements a simple neural network with one hidden layer and one output
 * neuron.
 * The network uses the sigmoid activation function and performs binary
 * classification.
 * (https://cw.fel.cvut.cz/b211/courses/be5b33rpz/labs/07_perceptron/start)
 *
 * @author Michał Żarnecki https://github.com/rzarno
 */
class NeuralNetworkPerceptronClassifier
{
    /**
     * Train model.
     *
     * @param array $X            The x.
     * @param array $Y            The y.
     * @param int   $iterations   The iterations.
     * @param float $learningRate The learning rate.
     *
     * @return array
     */
    public function trainModel(
        array $X,
        array $Y,
        int $iterations,
        float $learningRate
    ): array {
        [$W, $b] = $this->_initParams(count($X));

        for ($i = 0; $i < $iterations; $i++) {
            // Forward propagation
            $A = $this->_forwardPropagation($X, $W, $b);

            // Compute cost
            $cost = $this->_computeCost($A, $Y);

            // Backward propagation
            [$dW, $db] = $this->_backwardPropagation($A, $X, $Y);

            // Update parameters
            [$W, $b] = $this->_updateParams($W, $b, $dW, $db, $learningRate);

            if ($i % 100 == 0) {
                echo sprintf('Iteration %d - Cost: %s%s', $i, $cost, PHP_EOL);
            }
        }

        return [$W, $b];
    }

    /**
     * Predict.
     *
     * @param array $X The x.
     * @param array $W The w.
     * @param float $b The b.
     *
     * @return array
     */
    public function predict(array $X, array $W, float $b): array
    {
        $A = $this->_forwardPropagation($X, $W, $b);
        return array_map(fn ($a): int => $a > 0.5 ? 1 : 0, $A);
    }

    /**
     * Stage 1. Prepare dataset
     *
     * @return array[]
     */
    public function generateTrainingSet(): array
    {
        $m = 50;

        // Generate a 2 x m matrix with binary values (0 or 1)
        $X = [];
        for ($i = 0; $i < 2; $i++) {
            for ($j = 0; $j < $m; $j++) {
                $X[$i][$j] = random_int(0, 1);
            }
        }

        // Compute Y: Logical AND condition (X[0] == 1 and X[1] == 0)
        $Y = [];
        for ($j = 0; $j < $m; $j++) {
            $Y[$j] = ($X[0][$j] == 1 && $X[1][$j] == 0) ? 1 : 0;
        }

        return [$X, $Y];
    }

    /**
     * Stage 2. Initialize model parameters
     *
     * @param int $n Number of features
     *
     * @return array [$W, $b] Weight and bias arrays
     */
    private function _initParams(int $n): array
    {
        $W = [];
        for ($i = 0; $i < $n; $i++) {
            $W[$i] = mt_rand() / mt_getrandmax(); // Small random values
        }

        $b = 0.0; // Bias initialized to zero
        return [$W, $b];
    }

    /**
     * Sigmoid Activation Function
     *
     * @param float $z The z.
     *
     * @return float
     */
    private function _sigmoid(float $z): float
    {
        return 1 / (1 + exp(-$z));
    }

    /**
     * Stage 3. Forward Propagation
     *
     * @param array $X The x.
     * @param array $W The w.
     * @param float $b The b.
     *
     * @return array
     */
    private function _forwardPropagation(array $X, array $W, float $b): array
    {
        $Z = [];
        $counter = count($X[0]);
        for ($j = 0; $j < $counter; $j++) {
            $sum = $b;
            for ($i = 0; $i < count($W); $i++) {
                $sum += $W[$i] * $X[$i][$j];
            }

            $Z[$j] = $this->_sigmoid($sum);
        }

        return $Z;
    }

    /**
     * Stage 4. Compute Cost Function (Binary Cross-Entropy Loss)
     *
     * @param array $A The a.
     * @param array $Y The y.
     *
     * @return float
     */
    private function _computeCost(array $A, array $Y): float
    {
        $m = count($Y);
        $cost = 0.0;
        for ($i = 0; $i < $m; $i++) {
            $cost += -($Y[$i] * log($A[$i]) + (1 - $Y[$i]) * log(1 - $A[$i]));
        }

        return $cost / $m;
    }

    /**
     * Stage 5. Backward Propagation
     *
     * @param array $A The a.
     * @param array $X The x.
     * @param array $Y The y.
     *
     * @return array
     */
    private function _backwardPropagation(array $A, array $X, array $Y): array
    {
        $m = count($Y);
        $dW = array_fill(0, count($X), 0.0);
        $db = 0.0;

        for ($j = 0; $j < $m; $j++) {
            $dZ = $A[$j] - $Y[$j];
            $counter = count($X);
            for ($i = 0; $i < $counter; $i++) {
                $dW[$i] += $dZ * $X[$i][$j];
            }

            $db += $dZ;
        }

        // Average gradients
        $counter = count($dW);

        // Average gradients
        for ($i = 0; $i < $counter; $i++) {
            $dW[$i] /= $m;
        }

        $db /= $m;

        return [$dW, $db];
    }

    /**
     * STage 6. Update Parameters
     *
     * @param array $W            The w.
     * @param float $b            The b.
     * @param array $dW           The d w.
     * @param float $db           The db.
     * @param float $learningRate The learning rate.
     *
     * @return array
     */
    private function _updateParams(
        array $W,
        float $b,
        array $dW,
        float $db,
        float $learningRate
    ): array {
        $counter = count($W);
        for ($i = 0; $i < $counter; $i++) {
            $W[$i] -= $learningRate * $dW[$i];
        }

        $b -= $learningRate * $db;

        return [$W, $b];
    }
}
