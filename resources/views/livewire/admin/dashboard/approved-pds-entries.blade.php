<x-dashboard-card
    :count="$approvedPdsSubmissionsCount"
    :changePercentage="$percentageApproved"
    title="Approved Entries"
    changeLabel="out of total submissions"
    iconClass="bi-patch-check-fill"
    colorClass="success"
    capacityLabel="Approval Progress"
    :href="$link"
/>