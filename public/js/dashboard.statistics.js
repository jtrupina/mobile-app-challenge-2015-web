$(function () {

    Morris.Bar({
        element: 'projects',
        data: projects,
        xkey: 'name',
        ykeys: ['aggregate'],
        labels: ['Aggregate'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto'
    });

    Morris.Bar({
        element: 'users',
        data: users,
        xkey: 'name',
        ykeys: ['aggregate'],
        labels: ['Aggregate'],
        barRatio: 0.4,
        xLabelAngle: 35,
        hideHover: 'auto'
    });

});

