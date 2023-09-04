<div class='wrap'>
    <h1>Extrums Test Plugin</h1>
    <form id="etp-main">
        <input type="hidden" name="action" value="etp-find-posts">
        <input type='text' name='key'>
        <input type='submit' value='Search'>
    </form>
</div>

<style>
    #etp-results .column {
        width: 25%;
    }
    #etp-results .header-fields,
    #etp-results .body-fields {
        display: flex;
    }
    #etp-results .header-fields > div,
    #etp-results .body-fields> div {
        width: 50%;
    }
</style>

<div id="etp-results"></div>