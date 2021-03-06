<?php

declare(strict_types=1);

namespace Tests\Sylius\OrderCommentsPlugin\Comments\Application\Command;

use PHPUnit\Framework\TestCase;
use Sylius\OrderCommentsPlugin\Application\Command\CommentOrder;

final class CommentOrderTest extends TestCase
{
    /**
     * @test
     */
    public function it_is_immutable_intention_of_commenting_an_order_by_customer(): void
    {
        $command = CommentOrder::create('#00002', 'test@test.com', 'Hello');

        $this->assertEquals('#00002', $command->orderNumber());
        $this->assertEquals('test@test.com', $command->authorEmail());
        $this->assertEquals('Hello', $command->message());
    }

    /**
     * @test
     */
    public function it_has_option_file_path_and_file_type(): void
    {
        $file = new \SplFileInfo('text.txt');
        $command = CommentOrder::create('#00002', 'test@test.com', 'Hello', $file);

        $this->assertEquals($file, $command->file());
    }
}
