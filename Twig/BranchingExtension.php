<?php
namespace TheRat\BranchingBundle\Twig;

use TheRat\BranchingBundle\Helper\Git;

class BranchingExtension extends \Twig_Extension
{
    const CURRENT_BRANCH = 'current_branch';
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $env;

    public function __construct($kernelRootDir, $env)
    {
        $this->path = realpath($kernelRootDir . '/../');
        $this->env = $env;
    }

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'the_rat_branching_extension';
    }

    public function getFunctions()
    {
        return [
            self::CURRENT_BRANCH => new \Twig_SimpleFunction(self::CURRENT_BRANCH, [$this, 'getCurrentBranch'])
        ];
    }

    public function getCurrentBranch($prefix = '', $postfix = '')
    {
        $result = null;
        if (in_array($this->env, ['dev', 'test'])) {
            $result = sprintf('%s%s (%s)%s', $prefix, Git::getCurrentBranch($this->path), $this->env, $postfix);
        }
        return $result;
    }
}
