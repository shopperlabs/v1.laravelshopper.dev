<?php

namespace App\Markdown\Hint;

use League\CommonMark\Node\Node;
use League\CommonMark\Renderer\ChildNodeRendererInterface;
use League\CommonMark\Renderer\NodeRendererInterface;
use League\CommonMark\Util\HtmlElement;

final class HintRenderer implements NodeRendererInterface
{
    public function render(Node $node, ChildNodeRendererInterface $childRenderer)
    {
        Hint::assertInstanceOf($node);

        $attrs = $node->data->get('attributes');
        isset($attrs['class']) ? $attrs['class'] .= ' hint' : $attrs['class'] = 'hint';

        if ($type = $node->getType()) {
            $attrs['class'] = isset($attrs['class']) ? $attrs['class'] . ' ' : '';
            $attrs['class'] .= $type;
        }

        if ($type === 'watch') {
            return $this->renderWatch($node, $childRenderer, $attrs);
        }

        if ($type === 'callout') {
            return $this->renderCallout($node, $childRenderer, $attrs);
        }

        $title = $node->getTitle();
        $title = $title
            ? new HtmlElement(
                'span',
                ['class' => 'hint-title'],
                $title,
            )
            : '';

        $content = new HtmlElement(
            'div',
            ['class' => 'hint-content'],
            $childRenderer->renderNodes($node->children())
        );

        return new HtmlElement(
            'div',
            $attrs,
            "\n" .
            $title . "\n" .
            $content .
            "\n"
        );
    }

    private function renderCallout(Hint $node, ChildNodeRendererInterface $childRenderer, array $attrs)
    {
        $content = new HtmlElement(
            'div',
            ['class' => 'hint-content'],
            $childRenderer->renderNodes($node->children())
        );

        return new HtmlElement(
            'div',
            $attrs,
            '<a href="'.$node->getTitle().'">' .
            $childRenderer->renderNodes($node->children()).
            '</a>'.
            $content
        );
    }

    private function renderWatch(Hint $node, ChildNodeRendererInterface $childRenderer, array $attrs)
    {
        $caption = new HtmlElement(
            'p',
            ['class' => 'caption'],
            $childRenderer->renderNodes($node->children())
        );

        return new HtmlElement(
            'div',
            $attrs,
            '<div class="embed">'.
                '<iframe src="'.$node->getTitle().'"></iframe>'.
            '</div>'.
            $caption
        );
    }
}
