<x-dashboard-card
    :count="$revisionPdsSubmissionCount"
    :changePercentage="$percentageRevised"
    title="Needs Revision"
    iconClass="bi-file-earmark-excel-fill"
    colorClass="danger"
    capacityLabel="Revised Percentage"
    changeLabel="out of total submissions"
    :href="$link"
/>
