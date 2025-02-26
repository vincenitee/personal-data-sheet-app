<?php

namespace App\Enums;

enum CriminalCaseStatus: string
{
    case UNDER_INVESTIGATION = 'Under Investigation';
    case FILED_IN_COURT = 'Filed in Court';
    case PENDING_ARREST = 'Pending Arrest';
    case PENDING_ARRAIGNMENT = 'Pending Arraignment';
    case PENDING_TRIAL = 'Pending Trial';
    case SUBMITTED_FOR_DECISION = 'Submitted for Decision';
    case RESOLVED = 'Resolved';
    case ON_APPEAL = 'On Appeal';
    case DISMISSED = 'Dismissed';
    case ARCHIVED = 'Archived';
    case CONVICTED = 'Convicted';
    case ACQUITTED = 'Acquitted';
    case PROBATION = 'Probation';
    case ON_BAIL = 'On Bail';
    case DETAINED = 'Detained';
    case SUSPENDED = 'Suspended';
    case WITHDRAWN = 'Withdrawn';
    case TRANSFERRED = 'Transferred';
    case EXECUTED = 'Executed';
    case PARDONED = 'Pardoned';
    case PAROLE = 'Parole';
    case CASE_CLOSED = 'Case Closed';

    /**
     * Get all statuses as an associative array.
     *
     * @return array
     */
    public static function all(): array
    {
        return array_map(fn($case) => $case->value, self::cases());
    }

    /**
     * Get the display name of the status.
     *
     * @return string
     */
    public static function options(): array
    {
        return array_combine(
            array_column(self::cases(), 'value'),
            array_map(fn($case) => ucwords(str_replace('_', ' ', $case->value)), self::cases())
        );
    }
}
