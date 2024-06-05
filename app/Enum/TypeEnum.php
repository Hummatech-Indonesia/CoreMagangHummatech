<?php

namespace App\Enum;

enum TypeEnum : string
{
    case JOURNAL = 'journal';
    case CODEOFCONDUCT = 'code-of-conduct';
    case REPORT = 'report';
    case FILE_COURSE = 'file_course';
    case VIDEOS_COURSE = 'videos_course';
    case LETTERHEAD = 'letterhead';
    case WARNING_LETTER = 'warning_letter';
    case CV = 'cv';
    case SELFSTATEMENT = 'self_statement';
    case PARENTSSTATEMENT = 'parents_statement';
    case AVATAR = 'avatar';
    case RESPONSELETTER = 'response_letter';
    case PRODUCT = 'product';
    case COURSES = 'courses';
    case IMAGE_COURSE = 'image_course';
    case VIDEO_COURSE = 'video_course';
    case MENTOR = 'mentor';
    case DATAADMIN = 'data_admin';
    case DATACO = 'data_co';
    case PERMISSION = 'permission';
    case TASKSUBMISSION = 'task_submission';
    case TASKANSWER = 'task-answer';
    case PICKET = 'picket';
    case SUBMITTASK = 'submit_task';

    case HUMMATASKTEAM = 'hummatask_team';
    case CHALLENGEANSWER = 'challenge_answer';
}
