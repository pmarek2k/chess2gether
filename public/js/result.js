function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}
sleep(3000).then(() => {
    window.location.href = "/home";
})
