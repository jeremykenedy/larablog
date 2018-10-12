<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MarkdownerTest extends TestCase
{
    protected $markdown;

    /**
     * Initial setup of contructor
     *
     * @return void
     */
    public function setup()
    {
        $this->markdown = new \App\Services\Markdowner();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    /**
     * Test the Markdowner Service.
     *
     * @return void
     */
    public function testSimpleParagraph()
    {
        $this->assertEquals(
            "<p>Hello World!</p>\n",
            $this->markdown->toHTML('Hello World!')
        );
    }

    /**
     * @dataProvider conversionsProvider
     *
     * @param string $value     The value
     * @param string $expected  The expected
     *
     * @return void
     */
    public function testConversions($value, $expected)
    {
        $this->assertEquals($expected, $this->markdown->toHTML($value));
    }

    /**
     * Array of values and expectations to tests
     *
     * @return array
     */
    public function conversionsProvider()
    {
        return [
            ["test", "<p>test</p>\n"],
            ["# title", "<h1>title</h1>\n"],
            ["Here's Jeremy!", "<p>Here&#8217;s Jeremy!</p>\n"],
        ];
    }

}
