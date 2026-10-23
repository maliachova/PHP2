<?php

/**
 * Test cases for trie.
 *
 * PHP version 8.2
 *
 * @category DataStructures
 * @license  https://opensource.org/licenses/MIT MIT License
 * @link     https://github.com/TheAlgorithms/PHP
 */

/*
 * Created by: Ramy-Badr-Ahmed (https://github.com/Ramy-Badr-Ahmed) in Pull Request
 * #162 and #172
 * https://github.com/TheAlgorithms/PHP/pull/162
 * https://github.com/TheAlgorithms/PHP/pull/172
 *
 * Please mention me (@Ramy-Badr-Ahmed) in any issue or pull request addressing
 * bugs/corrections to this file.
 * Thank you!
 */

namespace DataStructures;

require_once __DIR__ . '/../../DataStructures/Trie/Trie.php';
require_once __DIR__ . '/../../DataStructures/Trie/TrieNode.php';

use DataStructures\Trie\Trie;
use DataStructures\Trie\TrieNode;
use PHPUnit\Framework\TestCase;

/**
 * Test cases for trie.
 */
class TrieTest extends TestCase
{
    private Trie $_trie;

    /**
     * Set up.
     *
     * @return void
     */
    protected function setUp(): void
    {
        $this->_trie = new Trie();
    }

    /**
     * Test insertion and search functionality of the Trie.
     *
     * @return mixed
     */
    public function testInsertAndSearch()
    {
        $this->_trie->insert('the');
        $this->_trie->insert('universe');
        $this->_trie->insert('is');
        $this->_trie->insert('vast');

        $this->assertTrue(
            $this->_trie->search('the'),
            'Expected "the" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('universe'),
            'Expected "universe" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('is'),
            'Expected "is" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('vast'),
            'Expected "vast" to be found in the Trie.'
        );
        $this->assertFalse(
            $this->_trie->search('the universe'),
            'Expected "the universe" not to be found in the Trie.'
        );
    }

    /**
     * Test insertion and search functionality with mixed case words.
     *
     * @return mixed
     */
    public function testInsertAndSearchMixedCase()
    {
        $this->_trie->insert('Apple');
        $this->_trie->insert('aPPle');
        $this->assertTrue(
            $this->_trie->search('apple'),
            'Expected "apple" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('APPLE'),
            'Expected "APPLE" to be found in the Trie.'
        );
    }

    /**
     * Test insertion and search functionality with special characters.
     *
     * @return mixed
     */
    public function testInsertAndSearchWithSpecialCharacters()
    {
        $this->_trie->insert('hello123');
        $this->_trie->insert('user@domain.com');
        $this->assertTrue(
            $this->_trie->search('hello123'),
            'Expected "hello123" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('UseR@domain.CoM'),
            'Expected "user@domain.com" to be found in the Trie.'
        );
        $this->assertTrue(
            $this->_trie->search('HELLO123'),
            'Expected "HELLO123" not to be found in the Trie (case-sensitive).'
        );
    }

    /**
     * Test insertion and search functionality with long strings.
     *
     * @return mixed
     */
    public function testInsertAndSearchLongStrings()
    {
        $longString = str_repeat('a', 1000);
        $this->_trie->insert($longString);
        $this->assertTrue(
            $this->_trie->search($longString),
            'Expected the long string to be found in the Trie.'
        );
    }

    /**
     * Test the startsWith functionality of the Trie.
     *
     * @return mixed
     */
    public function testStartsWith()
    {
        $this->_trie->insert('hello');
        $this->assertEquals(
            ['hello'],
            $this->_trie->startsWith('he'),
            'Expected words starting with "he" to be found.'
        );
        $this->assertEquals(
            ['hello'],
            $this->_trie->startsWith('hello'),
            'Expected words starting with "hello" to be found.'
        );
        $this->assertEquals(
            [],
            $this->_trie->startsWith('world'),
            'Expected no words starting with "world" to be found.'
        );
    }

    /**
     * Test startsWith functionality with mixed case prefixes.
     *
     * @return mixed
     */
    public function testStartsWithMixedCase()
    {
        $this->_trie->insert('PrefixMatch');
        $this->_trie->insert('PreFixTesting');
        $this->assertEquals(
            ['prefixmatch', 'prefixtesting'],
            $this->_trie->startsWith('prefix'),
            'Expected words starting with "prefix" to be found in the Trie ' .
            '(case-insensitive).'
        );

        $this->assertEquals(
            ['prefixmatch', 'prefixtesting'],
            $this->_trie->startsWith('PREFIX'),
            'Expected words starting with "PREFIX" to be found in the Trie ' .
            '(case-insensitive).'
        );
    }

    /**
     * Test deletion of existing words from the Trie.
     *
     * @return mixed
     */
    public function testDelete()
    {
        $this->_trie->insert('the');
        $this->_trie->insert('universe');
        $this->_trie->insert('is');
        $this->_trie->insert('vast');
        $this->_trie->insert('big');
        $this->_trie->insert('rather');

        // Test deleting an existing word
        $this->_trie->delete('the');
        $this->assertFalse(
            $this->_trie->search('the'),
            'Expected "the" not to be found after deletion.'
        );

        // Test that other words are still present
        $this->assertTrue(
            $this->_trie->search('universe'),
            'Expected "universe" to be found.'
        );
        $this->assertTrue($this->_trie->search('is'), 'Expected "is" to be found.');
        $this->assertTrue(
            $this->_trie->search('vast'),
            'Expected "vast" to be found.'
        );
        $this->assertTrue(
            $this->_trie->search('big'),
            'Expected "big" to be found.'
        );
        $this->assertTrue(
            $this->_trie->search('rather'),
            'Expected "rather" to be found.'
        );
    }

    /**
     * Test deletion of mixed case words from the Trie.
     *
     * @return mixed
     */
    public function testDeleteMixedCase()
    {
        $this->_trie->insert('MixedCase');
        $this->assertTrue(
            $this->_trie->search('mixedcase'),
            'Expected "mixedcase" to be found before deletion.'
        );

        $this->_trie->delete('MIXEDCASE');
        $this->assertFalse(
            $this->_trie->search('MixedCase'),
            'Expected "MixedCase" not to be found after deletion (case-insensitive).'
        );
    }

    /**
     * Test deletion of words with special characters.
     *
     * @return mixed
     */
    public function testDeleteWithSpecialCharacters()
    {
        $this->_trie->insert('spec!@l#chars');
        $this->assertTrue(
            $this->_trie->search('spec!@l#chars'),
            'Expected "spec!@l#chars" to be found before deletion.'
        );

        $this->_trie->delete('SPEC!@L#CHARS');
        $this->assertFalse(
            $this->_trie->search('spec!@l#chars'),
            'Expected "spec!@l#chars" not to be found after deletion.'
        );
    }

    /**
     * Test deletion of a non-existent word from the Trie.
     *
     * @return mixed
     */
    public function testDeleteNonExistentWord()
    {
        $this->_trie->delete('nonexistent');
        $this->assertFalse(
            $this->_trie->search('nonexistent'),
            'Expected "nonexistent" to not be found.'
        );
    }

    /**
     * Test traversal of the Trie and retrieval of words.
     *
     * @return mixed
     */
    public function testTraverseTrieNode()
    {
        $this->_trie->insert('hello');
        $this->_trie->insert('helium');
        $this->_trie->insert('helicopter');

        $words = $this->_trie->getWords();
        $this->assertContains(
            'hello',
            $words,
            'Expected "hello" to be found in the Trie.'
        );
        $this->assertContains(
            'helium',
            $words,
            'Expected "helium" to be found in the Trie.'
        );
        $this->assertContains(
            'helicopter',
            $words,
            'Expected "helicopter" to be found in the Trie.'
        );
        $this->assertCount(3, $words, 'Expected 3 words in the Trie.');
    }

    /**
     * Test behavior of an empty Trie.
     *
     * @return mixed
     */
    public function testEmptyTrie()
    {
        $this->assertEquals(
            [],
            $this->_trie->getWords(),
            'Expected an empty Trie to return an empty array.'
        );
    }

    /**
     * Test retrieval of words from the Trie.
     *
     * @return mixed
     */
    public function testGetWords()
    {
        $this->_trie->insert('apple');
        $this->_trie->insert('app');
        $this->_trie->insert('applet');

        $words = $this->_trie->getWords();
        $this->assertContains(
            'apple',
            $words,
            'Expected "apple" to be found in the Trie.'
        );
        $this->assertContains(
            'app',
            $words,
            'Expected "app" to be found in the Trie.'
        );
        $this->assertContains(
            'applet',
            $words,
            'Expected "applet" to be found in the Trie.'
        );
        $this->assertCount(3, $words, 'Expected 3 words in the Trie.');
    }

    /**
     * Test insertion of an empty string into the Trie.
     *
     * @return mixed
     */
    public function testInsertEmptyString()
    {
        $this->_trie->insert('');
        $this->assertTrue(
            $this->_trie->search(''),
            'Expected empty string to be found in the Trie.'
        );
    }

    /**
     * Test deletion of an empty string from the Trie.
     *
     * @return mixed
     */
    public function testDeleteEmptyString()
    {
        $this->_trie->insert('');
        $this->_trie->delete('');
        $this->assertFalse(
            $this->_trie->search(''),
            'Expected empty string not to be found after deletion.'
        );
    }

    /**
     * Test the startsWith functionality with a common prefix.
     *
     * @return mixed
     */
    public function testStartsWithWithCommonPrefix()
    {
        $this->_trie->insert('trie');
        $this->_trie->insert('tried');
        $this->_trie->insert('trier');

        $words = $this->_trie->startsWith('tri');
        $this->assertContains(
            'trie',
            $words,
            'Expected "trie" to be found with prefix "tri".'
        );
        $this->assertContains(
            'tried',
            $words,
            'Expected "tried" to be found with prefix "tri".'
        );
        $this->assertContains(
            'trier',
            $words,
            'Expected "trier" to be found with prefix "tri".'
        );
        $this->assertCount(3, $words, 'Expected 3 words with prefix "tri".');
    }

    /**
     * Test retrieval of the root node of the Trie.
     *
     * @return mixed
     */
    public function testGetRoot()
    {
        $root = $this->_trie->getRoot();
        $this->assertInstanceOf(
            TrieNode::class,
            $root,
            'Expected root to be an instance of TrieNode.'
        );
        $this->assertFalse(
            $root->isEndOfWord,
            'Expected the root node not to be the end of a word.'
        );
        $this->assertCount(
            0,
            $root->children,
            'Expected the root node to have no children initially.'
        );
    }

    /**
     * Test retrieval of the root node after populating the Trie with words.
     *
     * @return mixed
     */
    public function testGetRootAfterPopulation()
    {
        $this->_trie->insert('TheAlgorithms');
        $this->_trie->insert('PHP');
        $this->_trie->insert('DSA');

        $root = $this->_trie->getRoot();

        $this->assertInstanceOf(
            TrieNode::class,
            $root,
            'Expected root to be an instance of TrieNode.'
        );

        // Assert that the root node is not marked as the end of a word
        $this->assertFalse(
            $root->isEndOfWord,
            'Expected the root node not to be the end of a word.'
        );

        // Assert that the root node has children corresponding to the inserted words
        $this->assertCount(
            3,
            $root->children,
            'Expected the root node to have 3 children after inserting words.'
        );
        $this->assertTrue(
            $root->hasChild('t'),
            'Expected root to have a child for "t".'
        );
        $this->assertTrue(
            $root->hasChild('p'),
            'Expected root to have a child for "p".'
        );
        $this->assertTrue(
            $root->hasChild('D'),
            'Expected root to have a child for "D".'
        );
    }
}
