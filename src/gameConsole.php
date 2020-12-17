<?php


namespace MVA\AOC2020;

function runProgram(array $program): array
{
    $accumulator = 0;
    $instructionPointer = 0;
    $alreadyExecutedLines = [];

    while (isset($program[$instructionPointer])) {
        $instruction = $program[$instructionPointer];
        $alreadyExecutedLines[] = $instructionPointer;

        // echo "\n" . $instruction . ' | ' . $accumulator;
        [$operation, $argument] = explode(' ', $instruction);
        $argument = (int) $argument;


        switch ($operation) {
            case 'acc':
                $accumulator += $argument;
                $nextInstructionPointer = $instructionPointer + 1;
                break;
            case 'jmp':
                $nextInstructionPointer = $instructionPointer + $argument;
                break;
            case 'nop':
                $nextInstructionPointer = $instructionPointer + 1;
                break;
            default:
                echo 'unexpected operation';
                return 0;
        }

        $corruptedInstruction = in_array($nextInstructionPointer, $alreadyExecutedLines);
        if (in_array($nextInstructionPointer, $alreadyExecutedLines)) {
            return ['INFINITE_LOOP', $accumulator];
        } else {
            $instructionPointer = $nextInstructionPointer;
        }
    }

    return ['TERMINATED', $accumulator];
}

function repair ($program)
{
    foreach ($program as $line => $instruction) {
        $modifiedProgram = $program;
        $modifiedProgram[$line] = str_replace(['jmp', 'nop'], ['A', 'B'], $instruction);
        $modifiedProgram[$line] = str_replace(['A', 'B'], ['nop', 'jmp'], $modifiedProgram[$line]);

        $result = runProgram($modifiedProgram);
        if ($result[0] === 'TERMINATED') {
            return $result;
        }
    }
}
