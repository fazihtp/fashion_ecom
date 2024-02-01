$(function() {
    "use strict";

    // Initialize date range picker for Recent Orders if the element exists
    if ($("#recent-orders").length) {
        var start = moment().subtract(29, "days");
        var end = moment();
        var updateDateRange = function(start, end) {
            $("#recent-orders .date-range-report span").html(
                start.format("ll") + " - " + end.format("ll")
            );
        };

        $("#recent-orders .date-range-report").daterangepicker(
            {
                startDate: start,
                endDate: end,
                opens: 'left',
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month")
                    ]
                }
            },
            updateDateRange
        );

        updateDateRange(start, end);
    }

    // Initialize date range picker for User Activity if the element exists
    if ($("#user-activity").length) {
        var start = moment().subtract(1, "days");
        var end = moment().subtract(1, "days");
        var updateDateRange = function(start, end) {
            $("#user-activity .date-range-report span").html(
                start.format("ll") + " - " + end.format("ll")
            );
        };

        $("#user-activity .date-range-report").daterangepicker(
            {
                startDate: start,
                endDate: end,
                opens: 'left',
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month")
                    ]
                }
            },
            updateDateRange
        );

        updateDateRange(start, end);
    }

    // Initialize date range picker for Analytics Country if the element exists
    if ($("#analytics-country").length) {
        var start = moment();
        var end = moment();
        var updateDateRange = function(start, end) {
            $("#analytics-country .date-range-report span").html(
                start.format("ll") + " - " + end.format("ll")
            );
        };

        $("#analytics-country .date-range-report").daterangepicker(
            {
                startDate: start,
                endDate: end,
                opens: 'left',
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month")
                    ]
                }
            },
            updateDateRange
        );

        updateDateRange(start, end);
    }

    // Initialize date range picker for Page Views if the element exists
    if ($("#page-views").length) {
        var start = moment();
        var end = moment();
        var updateDateRange = function(start, end) {
            $("#page-views .date-range-report span").html(
                start.format("ll") + " - " + end.format("ll")
            );
        };

        $("#page-views .date-range-report").daterangepicker(
            {
                startDate: start,
                endDate: end,
                opens: 'left',
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month")
                    ]
                }
            },
            updateDateRange
        );

        updateDateRange(start, end);
    }

    // Initialize date range picker for Activity User if the element exists
    if ($("#activity-user").length) {
        var start = moment();
        var end = moment();
        var updateDateRange = function(start, end) {
            $("#activity-user .date-range-report span").html(
                start.format("ll") + " - " + end.format("ll")
            );
        };

        $("#activity-user .date-range-report").daterangepicker(
            {
                startDate: start,
                endDate: end,
                opens: 'left',
                ranges: {
                    Today: [moment(), moment()],
                    Yesterday: [moment().subtract(1, "days"), moment().subtract(1, "days")],
                    "Last 7 Days": [moment().subtract(6, "days"), moment()],
                    "Last 30 Days": [moment().subtract(29, "days"), moment()],
                    "This Month": [moment().startOf("month"), moment().endOf("month")],
                    "Last Month": [
                        moment().subtract(1, "month").startOf("month"),
                        moment().subtract(1, "month").endOf("month")
                    ]
                }
            },
            updateDateRange
        );

        updateDateRange(start, end);
    }
});
