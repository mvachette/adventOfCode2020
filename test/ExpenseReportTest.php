<?php


namespace MVA\AOC2020;
require_once __DIR__ . '/../src/expenseReport.php';

use PHPUnit\Framework\TestCase;

class ExpenseReportTest extends TestCase
{
    /**
     * @test
     */
    public function get_cheksum_as_the_product_of_2_entries_summing_up_as_2020()
    {
        // given
        $report = [1721, 979, 366, 299, 675, 1456];

        // then
        $this->assertEquals(514579, expenseReport\computeChecksum($report));
    }
}