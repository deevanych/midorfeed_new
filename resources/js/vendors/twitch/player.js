$(document).ready(function () {
    $(".twitch-player").each(function (i, el) {
        let channel = $(el).data('name'),
            container = el,
            options = {
                channel: channel,
            },
            player = new Twitch.Embed(container, options);
        player.setVolume(0.5);
    });
});
