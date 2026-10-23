<?php

/**
 * Test cases for singly linked list.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../vendor/autoload.php';
require_once __DIR__ . '/../../DataStructures/SinglyLinkedList.php';

/**
 * Tests for the Singly Linked Lists class
 */
class SinglyLinkedListTest extends TestCase
{
    /**
     * Create a SinglyLinkedList node
     *
     * @param string $string The string.
     *
     * @return SinglyLinkedList
     */
    private function _createNode(string $string): SinglyLinkedList
    {
        $node = new SinglyLinkedList($string[0]);

        for ($i = 1; $i < strlen($string); $i++) {
            $node->append($string[$i]);
        }

        return $node;
    }

    /**
     * Provider of SinglyLinkedList nodes
     *
     * @return mixed
     */
    public static function provideNodes()
    {
        return [
            'IsPalindrome' => [
                'string' => 'hannah',
                'expected' => true
            ],
            'IsPalindrome2' => [
                'string' => 'hanah',
                'expected' => true
            ],
            'IsNotPalindrome' => [
                'string' => 'hanbah',
                'expected' => false
            ],
            'IsNotPalindrome2' => [
                'string' => 'han1h',
                'expected' => false
            ],
        ];
    }

    /**
     * Test the if a SinglyLinkedList is a palindrome
     *
     * @dataProvider provideNodes
     *
     * @param mixed $string   The string.
     * @param mixed $expected The expected.
     *
     * @return void
     */
    public function testIsPalindrome($string, $expected): void
    {
        $node = $this->_createNode($string);
        $this->assertEquals($expected, $this->_isPalindrome($node));
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     *
     * @param SinglyLinkedList $node The node.
     *
     * @return bool
     */
    private function _isPalindrome(SinglyLinkedList $node): bool
    {
        $length = $this->_length($node);
        $pairs = 0;
        $curr = $node;

        while ($curr instanceof SinglyLinkedList) {
            if ($this->_hasPair($curr->next, $curr->data)) {
                $pairs++;
            }

            $curr = $curr->next;
        }

        return $pairs == floor($length / 2);
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     *
     * @param mixed  $node The node.
     * @param string $data The data.
     *
     * @return bool
     */
    private function _hasPair($node, string $data): bool
    {
        if (! $node instanceof SinglyLinkedList) {
            return false;
        }

        $curr = $node;

        while ($curr instanceof SinglyLinkedList) {
            if ($curr->data == $data) {
                return true;
            }

            $curr = $curr->next;
        }

        return false;
    }

    /**
     * Supporting method for testing if a linked list is palindrome
     *
     * @param SinglyLinkedList $node The node.
     *
     * @return int
     */
    private function _length(SinglyLinkedList $node): int
    {
        $curr = $node;
        $counter = 0;

        while ($curr instanceof SinglyLinkedList) {
            $counter++;
            $curr = $curr->next;
        }

        return $counter;
    }

    /**
     * Test SinglyLinkedList's delete functionality
     *
     * @return void
     */
    public function testDelete(): void
    {
        $this->assertEquals(
            $this->_createNode('hanah'), // expected node
            $this->_createNode('hannah')->delete('n'), // actual node
        );

        $this->assertNotEquals(
            $this->_createNode('hanah'), // expected node
            $this->_createNode('hannah')->delete('h'), // actual node
        );
    }
}
