<?php

namespace App\Enums;

enum MunicipalOffice: string
{
    case MAYOR = 'Office of the Mayor';
    case VICE_MAYOR = 'Office of the Vice Mayor';
    case SANGGUNIANG_BAYAN = 'Sangguniang Bayan';

    case PLANNING_AND_DEVELOPMENT = 'Municipal Planning and Development Office';
    case BUDGET = 'Municipal Budget Office';
    case ACCOUNTANT = "Municipal Accountant's Office";
    case TREASURER = "Municipal Treasurer’s Office";
    case ASSESSOR = "Municipal Assessor’s Office";
    case HR = 'Human Resource Management Office';
    case GENERAL_SERVICES = 'General Services Office';

    case HEALTH = 'Municipal Health Office';
    case SOCIAL_WELFARE = 'Municipal Social Welfare and Development Office';
    case AGRICULTURE = 'Municipal Agriculture Office';
    case ENGINEERING = 'Municipal Engineering Office';
    case ENVIRONMENT = 'Municipal Environment and Natural Resources Office (MENRO)';
    case DRRMO = 'Municipal Disaster Risk Reduction and Management Office (MDRRMO)';
    case CIVIL_REGISTRAR = 'Municipal Civil Registrar';
    case BPLO = 'Business Permit and Licensing Office (BPLO)';
    case INFORMATION = 'Municipal Information Office';

    case PESO = 'Public Employment Service Office (PESO)';
    case TOURISM = 'Tourism Office';
    case COOPERATIVE = 'Cooperative and Livelihood Office';
    case LEIPO = 'Local Economic and Investment Promotion Office (LEIPO)';
    case PEACE_AND_ORDER = 'Peace and Order Office';

    /**
     * Get an associative array for select components
     */
    public static function options(): array
    {
        return array_map(fn($case) => ['value' => $case->name, 'label' => $case->value], self::cases());
    }

    /**
     * Get all enum values as an array
     */
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }

    /**
     * Get the value of an enum case using the key
     */
    public static function getValue(?string $name): ?string
    {
        foreach (self::cases() as $case) {
            if ($case->name === $name) {
                return $case->value;
            }
        }
        return null;
    }

    /**
     * Get enum case using the value
     */
    public static function fromValue(string $value): ?self{
        foreach(self::cases() as $case){
            if($case->value === $value){
                return $case;
            }
        }

        return null;
    }
}
