<?php

namespace App\Markdown\Hint;

use League\CommonMark\Node\Block\AbstractBlock;
use League\CommonMark\Node\StringContainerInterface;

class Hint extends AbstractBlock implements StringContainerInterface
{
    protected $type;
    protected $title;
    private ?string $header = 'Hot Tip!';
    protected string $literal;

    public function canContain(AbstractBlock $block): bool
    {
        return true;
    }

    public function isCode(): bool
    {
        return false;
    }

    public function matchesNextLine(Cursor $cursor): bool
    {
        if ($cursor->match('/^:::$/')) {
            return false;
        }

        return true;
    }

    public function getTitle(): ?string
    {
        $words = $this->getHeaderWords();

        if ($this->title) {
            return $this->title;
        }

        if ($this->type === 'danger') {
            return 'Pay Attention!';
        }

        if ($this->type === 'warning') {
            return 'Warning!';
        }

        if ($this->type === 'info') {
            return 'Info!';
        }

        if ($this->type === 'best-practice') {
            return 'Best Practice';
        }

        return 'Hot Tip!';
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getHeaderWords(): array
    {
        return \preg_split('/\s+/', $this->header ?? '') ?: [];
    }

    public function setHeader($header): void
    {
        $this->header = $header;
    }

    public function setLiteral(string $literal): void
    {
        $this->literal = $literal;
    }

    public function getLiteral(): string
    {
        return $this->literal;
    }
}
