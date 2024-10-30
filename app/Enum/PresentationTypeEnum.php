<?php
namespace App\Enum;
enum PresentationTypeEnum: string
{
    case SOLO = 'solo project';
    case PREMINI = 'premini project';
    case MINI = 'mini project';
    case BIG = 'big project';
    case INTERVIEW = 'interview';
    case LIVECODING = 'livecoding';
}
