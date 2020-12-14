<?php


namespace MVA\AOC2020;

function parseRule(string $rule): array
{
    $parent = stristr($rule, ' bags', true);
    preg_match_all('#(\d+) ([^,]+) bags?[,.]#', $rule, $matches);
    $children = [];

    foreach ($matches[1] as $bagIndex => $number) {
        array_push($children, ...array_fill(0, $number, $matches[2][$bagIndex]));
    }
    return [$parent, $children];
}

function count_containers($searchedBag, $rules): int
{
    $tree = [];
    foreach ($rules as $rule) {
        [$parent, $children] = parseRule($rule);
        $tree[$parent] = $children;
    }
    return count(find_ancestors('shiny gold', $tree));
}

function count_all_bags($searchedBag, $rules): int
{
    $tree = [];
    foreach ($rules as $rule) {
        [$parent, $children] = parseRule($rule);
        $tree[$parent] = $children;
    }
    return count(find_descendants('shiny gold', $tree));
}

function find_ancestors($searched, $tree) {
    $ancestors = [];
    foreach ($tree as $parent => $children) {
        if (in_array($searched, $children)) {
            $ancestors[] = $parent;
        }
    }

    foreach ($ancestors as $ancestor) {
        array_push($ancestors, ...find_ancestors($ancestor, $tree));
    }

    return array_unique($ancestors);
}

function find_descendants($searched ,$tree)
{
    $descendants = [];
    foreach ($tree as $parent => $children) {
        if ($searched === $parent) {
            array_push($descendants, ...$children);
            foreach ($children as $child) {
                array_push($descendants, ...find_descendants($child, $tree));
            }
        }
    }

    return $descendants;
}
