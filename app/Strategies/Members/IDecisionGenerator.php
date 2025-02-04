<?php
namespace App\Strategies\Members;

interface IDecisionGenerator
{
    public function generate($members); // Generates the PDF
    public function getFileName(): string; // Returns the generated file name
}
