<?php
namespace TheRat\BranchingBundle\Helper;

use Symfony\Component\Process\Process;

class Git
{
    public static function getCurrentBranch($dir)
    {
        $cmd = sprintf('cd "%s" && git rev-parse --abbrev-ref HEAD', $dir);
        $process = new Process($cmd);
        $process->mustRun();
        $result = trim($process->getOutput());
        return $result;
    }

    public static function getRemoteBranches($dir)
    {
        $cmd = sprintf('cd "%s" && git fetch && git branch -r', $dir);
        $process = new Process($cmd);
        $process->mustRun();

        $output = explode("\n", $process->getOutput());
        $output = array_filter($output);

        $branches = [];
        foreach ($output as $row) {
            if (strpos($row, ' -> ') === false) {
                $branches[] = trim(str_replace('origin/', '', $row));
            }
        }

        usort($branches, [__CLASS__, 'sortBranches']);

        return $branches;
    }

    public static function sortBranches($a, $b)
    {
        if ($a == 'master') {
            $result = -1;
        } elseif ($b == 'master') {
            $result = 1;
        } else {
            $result = ($a < $b) ? -1 : 1;
        }

        return $result;
    }
}
