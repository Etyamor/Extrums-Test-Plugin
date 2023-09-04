jQuery(document).ready($ => {
    const mainForm = () => {
        $(document).find('form#etp-main').on('submit', e => {
            e.preventDefault();
            console.log('main');
            $.ajax({
                url: etpVars.admin_ajax,
                type: "GET",
                data: $(e.target).serialize(),
                success: (data) => {
                    $('#etp-results').html(data);
                    replaceForm();
                }
            })
        })
    }

    const replaceForm = () => {
        $(document).find('form.replace-form').on('submit', e => {
            e.preventDefault();
            console.log('replace');
            $.ajax({
                url: etpVars.admin_ajax,
                type: "POST",
                data: $(e.target).serialize(),
                success: (data) => {

                }
            })
        })
    }

    mainForm();
})