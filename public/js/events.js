const spinner = document.getElementById("spinner");

spinner.removeAttribute('hidden');
fetch("/getEvents", {
    headers: {
        'Content-Type': 'application/json',
        'Accept': 'application/json'
    },
}).then(function (response) {
    return response.json();
}).then(function (events) {
    loadEvents(events);
    spinner.setAttribute('hidden', 'true');
});



function loadEvents(events) {
    let eventsView = document.getElementById('event-view');
    for (let i = 0; i < events.length; i++) {
        eventsView.insertAdjacentHTML('afterbegin',
            `<div class = "event" id =${i}>
<section>${events[i].name}</section><section>Players: ${events[i].max_players}</section><section>Starts: ${events[i].begin_time.replace('T', ' ')}</section>
    <form method="post">
        <input type="text" id="event-name" name="event-name" value='${events[i].name}' hidden = true>
        <button class="submitMarkerButton" id=button${i} type="submit">Sign out from event</button>
    </form>
</div>`);
    }
}