<div class="new newstrip strips" id="customerstrips">
    <div class="headpage">

    </div>
    <div class="form">
        <form enctype="multipart/form-data" action="/customer/new/" method="post">
            <label for="name">Comic name</label>
            <input required type="text" name="name" id="name" placeholder="Comic name">
            <label for="description">Comic Description</label>
            <textarea required name="description" id="description" cols="30" rows="10" placeholder="Uitleg over comic"></textarea>
            <label for="caft">Voorkant comic</label>
            <input required type="file" name="caft" id="caft" accept="image/png">
            <input type="submit" value="Add new comic">
        </form>
    </div>
</div>