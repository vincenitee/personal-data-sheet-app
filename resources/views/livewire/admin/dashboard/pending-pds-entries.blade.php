
<x-dashboard-card
    :count="$pendingPdsSubmissionsCount"
    title="Under Review Entries"
    :changePercentage="$percentageUnderReview"
    changeLabel="out of total submissions"
    iconClass="bi-ticket-perforated-fill"
    colorClass="warning"
    capacityLabel="Review Progress"
    :href="$link"
/>

