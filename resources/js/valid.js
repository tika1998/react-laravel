$(document).ready(() => {
    $('#createForm').validate(({
        rules: {
            name: 'required',
            short_description: {
                required: true,
                minLength: 50
            },
            news: {
                required: true,
                minLength: 150
            },
        },

        messages: {
            name: 'Enter your name',
            short_description: {
                required: 'short description is required',
                minLength: 'min length 50',
            },
            news: {
                required: 'News is required',
            },
        }

    }))

})
