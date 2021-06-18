require("waypoints/lib/jquery.waypoints.js");

// Animate numbers function
function animateValue(obj, start, end, duration) {
    let startTimestamp = null;
    const step = (timestamp) => {
        if (!startTimestamp) startTimestamp = timestamp;
        const progress = Math.min((timestamp - startTimestamp) / duration, 1);
        obj.innerHTML = Math.floor(progress * (end - start) + start);
        if (progress < 1) {
            window.requestAnimationFrame(step);
        }
    };
    window.requestAnimationFrame(step);
}

let stats = new Waypoint({
    element: document.getElementById('stats'),
    handler: function () {
        const obj1 = document.getElementById("20-years");
        animateValue(obj1, 0, 20, 1000);

        const obj2 = document.getElementById("300-plus");
        animateValue(obj2, 0, 300, 1500);

        const obj3 = document.getElementById("twenty-four");
        animateValue(obj3, 0, 24, 1300);

        const obj4 = document.getElementById("seven");
        animateValue(obj4, 0, 7, 1500);

        const obj5 = document.getElementById("80-companies");
        animateValue(obj5, 0, 80, 800);
    },
    offset: 300
});