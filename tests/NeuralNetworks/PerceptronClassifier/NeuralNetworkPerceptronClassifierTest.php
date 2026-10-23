<?php

/**
 * Test cases for neural network perceptron classifier.
 *
 * PHP version 8.2
 *
 * @category NeuralNetworks
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

namespace NeuralNetworks\PerceptronClassifier;

require_once __DIR__ . '/../../../vendor/autoload.php';
require_once __DIR__ . '/../../../NeuralNetworks/PerceptronClassifier/'
    . 'NeuralNetworkPerceptronClassifier.php';

use PHPUnit\Framework\TestCase;

/**
 * Test cases for neural network perceptron classifier.
 */
class NeuralNetworkPerceptronClassifierTest extends TestCase
{
    /**
     * Test neural network perceptron classification.
     *
     * @return mixed
     */
    public function testNeuralNetworkPerceptronClassification()
    {
        $nnClassifier = new NeuralNetworkPerceptronClassifier();
        [$X, $Y] = $nnClassifier->generateTrainingSet();
        // Train the model
        [$W, $b] = $nnClassifier->trainModel($X, $Y, 1000, 0.1);

        // Make predictions
        $predictions = $nnClassifier->predict([[0, 0, 1, 1], [0, 1, 1, 0]], $W, $b);
        $this->assertEquals([0, 0, 0, 1], $predictions);
    }
}
