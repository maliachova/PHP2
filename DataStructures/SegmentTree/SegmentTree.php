<?php

/**
 * Segment tree.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

declare(strict_types=1);

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request
 * #166
 * https://github.com/TheAlgorithms/PHP/pull/166
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures\SegmentTree;

use InvalidArgumentException;
use OutOfBoundsException;

/**
 * Segment tree class.
 */
class SegmentTree
{
    private SegmentTreeNode $_root;
    // holds the original array and updates reflections
    private readonly int $_arraySize;

    // Size of the original array
    private $_callback;              // Callback function for aggregation
    /**
     * Initializes the segment tree with the provided array and optional callback for
     * aggregation.
     * Default aggregation is Sum.
     *
     * Example usage:
     *  $segmentTree = new SegmentTree($array, fn($a, $b) => max($a, $b));
     *
     * @param array         $currentArray The input array for the segment tree
     * @param callable|null $callback     Optional callback function for custom
     * aggregation logic.
     *
     * @throws InvalidArgumentException if the array is empty, contains non-numeric
     * values, or is associative.
     */
    public function __construct(
        private array $currentArray,
        ?callable $callback = null
    ) {
        $this->_arraySize = count($this->currentArray);
        $this->_callback = $callback;

        if ($this->_isUnsupportedArray()) {
            throw new InvalidArgumentException(
                "Array must not be empty, must contain numeric values \n"
                . "            and must be non-associative."
            );
        }

        $this->_root = $this->_buildTree(
            $this->currentArray,
            0,
            $this->_arraySize - 1
        );
    }

    /**
     * Is unsupported array.
     *
     * @return bool
     */
    private function _isUnsupportedArray(): bool
    {
        if ($this->currentArray === []) {
            return true;
        }
        if ($this->_isNonNumeric()) {
            return true;
        }
        return $this->_isAssociative();
    }

    /**
     * Is non numeric.
     *
     * @return bool True if any element is non-numeric, false otherwise.
     */
    private function _isNonNumeric(): bool
    {
        return !array_reduce(
            $this->currentArray,
            fn ($carry, $item): bool => $carry && is_numeric($item),
            true
        );
    }

    /**
     * Is associative.
     *
     * @return bool True if the array is associative, false otherwise.
     */
    private function _isAssociative(): bool
    {
        return array_keys($this->currentArray) !== range(0, $this->_arraySize - 1);
    }

    /**
     * Get root.
     *
     * @return SegmentTreeNode The root node of the segment tree.
     */
    public function getRoot(): SegmentTreeNode
    {
        return $this->_root;
    }

    /**
     * Get current array.
     *
     * @return array The original or the current array (after any update) stored in
     * the segment tree.
     */
    public function getCurrentArray(): array
    {
        return $this->currentArray;
    }

    /**
     * Builds the segment tree recursively. Takes O(n log n) in total.
     *
     * @param array $arr   The input array.
     * @param int   $start The starting index of the segment.
     * @param int   $end   The ending index of the segment.
     *
     * @return SegmentTreeNode The root node of the constructed segment.
     */
    private function _buildTree(array $arr, int $start, int $end): SegmentTreeNode
    {
        // Leaf node
        if ($start === $end) {
            return new SegmentTreeNode($start, $end, $arr[$start]);
        }

        $mid = $start + (int)(($end - $start) / 2);

        // Recursively build left and right children
        $leftChild = $this->_buildTree($arr, $start, $mid);
        $rightChild = $this->_buildTree($arr, $mid + 1, $end);

        $node = new SegmentTreeNode($start, $end, $this->_callback
            ? ($this->_callback)($leftChild->value, $rightChild->value)
            : $leftChild->value + $rightChild->value);

        // Link the children to the parent node
        $node->left = $leftChild;
        $node->right = $rightChild;

        return $node;
    }

    /**
     * Queries the aggregated value over a specified range. Takes O(log n).
     *
     * @param int $start The starting index of the range.
     * @param int $end   The ending index of the range.
     *
     * @throws OutOfBoundsException if the range is invalid.
     *
     * @return int|float The aggregated value for the range.
     */
    public function query(int $start, int $end)
    {
        if ($start > $end || $start < 0 || $end > ($this->_root->end)) {
            throw new OutOfBoundsException(
                "Index out of bounds: start = {$start}, end = {$end}. \n"
                . "            Must be between 0 and " . ($this->_arraySize - 1)
            );
        }

        return $this->_queryTree($this->_root, $start, $end);
    }

    /**
     * Recursively queries the segment tree for a specific range.
     *
     * @param SegmentTreeNode $node  The current node.
     * @param int             $start The starting index of the query range.
     * @param int             $end   The ending index of the query range.
     *
     * @return int|float The aggregated value for the range.
     */
    private function _queryTree(SegmentTreeNode $node, int $start, int $end)
    {
        if ($node->start === $start && $node->end === $end) {
            return $node->value;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

        // Determine which segment of the tree to query
        if ($end <= $mid) {
            // Query left child
            return $this->_queryTree($node->left, $start, $end);
        } elseif ($start > $mid) {
            // Query right child
            return $this->_queryTree($node->right, $start, $end);
        } else {
            // Split query between left and right children
            $leftResult = $this->_queryTree($node->left, $start, $mid);
            $rightResult = $this->_queryTree($node->right, $mid + 1, $end);

            return $this->_callback
                ? ($this->_callback)($leftResult, $rightResult)
                // Default sum if no callback
                : $leftResult + $rightResult;
        }
    }

    /**
     * Updates the value at a specified index in the segment tree. Takes O(log n).
     *
     * @param int       $index The index to update.
     * @param int|float $value The new value to set.
     *
     * @throws OutOfBoundsException if the index is out of bounds.
     *
     * @return void
     */
    public function update(int $index, int $value): void
    {
        if ($index < 0 || $index >= $this->_arraySize) {
            throw new OutOfBoundsException(sprintf(
                'Index out of bounds: %d. Must be between 0 and ',
                $index
            )
                . ($this->_arraySize - 1));
        }

        $this->_updateTree($this->_root, $index, $value);
        // Reflect the update in the original array
        $this->currentArray[$index] = $value;
    }

    /**
     * Recursively updates the segment tree.
     *
     * @param SegmentTreeNode $node  The current node.
     * @param int             $index The index to update.
     * @param int|float       $value The new value.
     *
     * @return void
     */
    private function _updateTree(SegmentTreeNode $node, int $index, $value): void
    {
        // Leaf node
        if ($node->start === $node->end) {
            $node->value = $value;
            return;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

        // Decide whether to go to the left or right child
        if ($index <= $mid) {
            $this->_updateTree($node->left, $index, $value);
        } else {
            $this->_updateTree($node->right, $index, $value);
        }

        // Recompute the value of the current node after the update
        $node->value = $this->_callback
            ? ($this->_callback)($node->left->value, $node->right->value)
            : $node->left->value + $node->right->value;
    }

    /**
     * Performs a range update on a specified segment.
     *
     * @param int       $start The starting index of the range.
     * @param int       $end   The ending index of the range.
     * @param int|float $value The value to set for the range.
     *
     * @throws OutOfBoundsException if the range is invalid.
     *
     * @return void
     */
    public function rangeUpdate(int $start, int $end, $value): void
    {
        if ($start < 0 || $end >= $this->_arraySize || $start > $end) {
            throw new OutOfBoundsException(
                sprintf('Invalid range: start = %d, end = %d.', $start, $end)
            );
        }

        $this->_rangeUpdateTree($this->_root, $start, $end, $value);

        // Update the original array to reflect the range update
        $this->currentArray = array_replace(
            $this->currentArray,
            array_fill_keys(range($start, $end), $value)
        );
    }

    /**
     * Recursively performs a range update in the segment tree.
     *
     * @param SegmentTreeNode $node  The current node.
     * @param int             $start The starting index of the range.
     * @param int             $end   The ending index of the range.
     * @param int|float       $value The new value for the range.
     *
     * @return void
     */
    private function _rangeUpdateTree(
        SegmentTreeNode $node,
        int $start,
        int $end,
        $value
    ): void {
        // Leaf node
        if ($node->start === $node->end) {
            $node->value = $value;
            return;
        }

        $mid = $node->start + (int)(($node->end - $node->start) / 2);

        // Determine which segment of the tree to update (Left, Right, Split
        // respectively)
        if ($end <= $mid) {
            // Entire range is in the left child
            $this->_rangeUpdateTree($node->left, $start, $end, $value);
        } elseif ($start > $mid) {
            // Entire range is in the right child
            $this->_rangeUpdateTree($node->right, $start, $end, $value);
        } else {
            // Range is split between left and right children
            $this->_rangeUpdateTree($node->left, $start, $mid, $value);
            $this->_rangeUpdateTree($node->right, $mid + 1, $end, $value);
        }

        // Recompute the value of the current node after the update
        $node->value = $this->_callback
            ? ($this->_callback)($node->left->value, $node->right->value)
            : $node->left->value + $node->right->value;
    }

    /**
     * Serializes the segment tree into a JSON string.
     *
     * @return string The serialized segment tree as a JSON string.
     */
    public function serialize(): string
    {
        return json_encode($this->_serializeTree($this->_root));
    }

    /**
     * Recursively serializes the segment tree.
     *
     * @param SegmentTreeNode|null $node The current node.
     *
     * @return array The serialized representation of the node.
     */
    private function _serializeTree(?SegmentTreeNode $node): array
    {
        if (!$node instanceof \DataStructures\SegmentTree\SegmentTreeNode) {
            return [];
        }

        return [
            'start' => $node->start,
            'end' => $node->end,
            'value' => $node->value,
            'left' => $this->_serializeTree($node->left),
            'right' => $this->_serializeTree($node->right),
        ];
    }

    /**
     * Deserializes a JSON string into a SegmentTree object.
     *
     * @param string $data The JSON string to deserialize.
     *
     * @return SegmentTree The deserialized segment tree.
     */
    public static function deserialize(string $data): self
    {
        $array = json_decode($data, true);

        $initialiseArray = array_fill(0, $array['end'] + 1, 0);
        $segmentTree = new self($initialiseArray);

        $segmentTree->_root = $segmentTree->_deserializeTree($array);
        return $segmentTree;
    }

    /**
     * Recursively deserializes a segment tree from an array representation.
     *
     * @param array $data The serialized data for the node.
     *
     * @return SegmentTreeNode|null The deserialized node.
     */
    private function _deserializeTree(array $data): ?SegmentTreeNode
    {
        if ($data === []) {
            return null;
        }

        $node = new SegmentTreeNode($data['start'], $data['end'], $data['value']);

        $node->left = $this->_deserializeTree($data['left']);
        $node->right = $this->_deserializeTree($data['right']);
        return $node;
    }
}
