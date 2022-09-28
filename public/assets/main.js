// Loader
$(window).on("load", function () {
    $("#global-loader").fadeOut("slow")

    $('#burger').on('click', function() {
        $(this).children().first().toggleClass('rotate-45 absolute left-1/4')
        $(this).children().eq(2).toggleClass('rotate-[-45deg] absolute left-1/4')
        $(this).children().eq(1).toggleClass('opacity-0')
        $('#menumobile').toggleClass('bg-white')
        $('#menumobile').children().eq(1).toggleClass('hidden')
        $('#menumobile').children().eq(2).toggleClass('hidden')
        $('#menumobile').children().eq(3).toggleClass('hidden')
        $('#menumobile').children().eq(4).toggleClass('hidden')
        $('#menumobile').toggleClass('h-screen')
    })
})
