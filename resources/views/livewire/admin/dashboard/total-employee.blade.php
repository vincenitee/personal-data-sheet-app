
<x-dashboard-card
    :count="$employeeCountCurrent"
    title="Total Employees"
    :changePercentage="$percentageIncrease"
    iconClass="bi-people-fill"
    changeLabel="Since last month"
    :showProgressBar="false"
/>
