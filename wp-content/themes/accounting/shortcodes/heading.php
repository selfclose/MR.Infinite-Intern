<div class="submit-wrapper">
    <div class="form-group">
        <label for="content">Text</label>
        <input type="text" id="content">
        <p>Adding this attribute will change the text color. The color needs to be added as a HEX value (ie. #000).</p>
    </div>

    <div class="form-group">
        <label for="type">Type</label>
        <select id="type">
            <option value="heading">Middle heading</option>
            <option value="content_heading">Content heading</option>
            <option value="style-3">Left heading</option>
        </select>
        <p>Heading type.</p>
    </div>

    <div class="form-group">
        <label for="size">Size</label>
        <select id="size">
            <option value="1">H1</option>
            <option value="2">H2</option>
            <option value="3">H3</option>
            <option value="4">H4</option>
            <option value="5">H5</option>
        </select>
        <p>Heading size. Larger the value, smaller the heading size.</p>
    </div>

    <div class="form-group">
        <label for="id">ID</label>
        <input type="text" id="id">
        <p>Adds an ID attribute to the element. Useful for one page menu referencing.</p>
    </div>

    <div class="form-group last">
        <label for="elClass">Extra class name</label>
        <input type="text" id="elClass">
        <p>If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.</p>
    </div>

    <div class="buttons">
        <input type="button" class="cancel" value="Cancel" onclick="anps_Cancel()" />
        <input type="button" class="submit" value="Insert" onclick="anps_getValue()" />
    </div>
</div>

<script>
function anps_getValue() { 
    content = document.getElementById('content').value;
    size = document.getElementById('size').value;
    id = document.getElementById('id').value;
    type = document.getElementById('type').value;
    elClass = document.getElementById('elClass').value;

    window.parent.send_to_editor('[heading size="' + size + '" heading_class="' + type + '" h_id="' + id + '" h_class="' + elClass + '"]' + content + '[/heading]');
}
function anps_Cancel() {
    window.parent.send_to_editor(' ');
}
</script>

<style>
    body {
        color: #222;
        font-size: 13px;
        font-family: 'Arial';
        padding: 0 20px;
    }

    .buttons {
        text-align: center;
    }

    label {
        display: block;
        margin-top: 25px;
        margin-bottom: 8px;
    }

    .form-group p {
        border-bottom: 1px solid #ddd;
        color: #999;
        padding-bottom: 20px;
    }

    .form-group.last p {
        border: none;
    }

    input[type="text"], select {
        border: 1px solid #ddd;
        -webkit-box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
        box-shadow: inset 0 1px 2px rgba(0, 0, 0, 0.07);
        background-color: #FFF;
        color: #333;
        padding: 7px 9px;
        -webkit-transition: .05s border-color ease-in-out;
        transition: .05s border-color ease-in-out;
        width: 100%;
    }

    input[type="button"] {
        border-radius: 3px;
        cursor: pointer;
        display: inline-block;
        font-size: 13px;
        padding-bottom: 10px;
        padding-top: 8px;
        text-align: center;
    }

    .cancel {
        background-color: #F7F7F7;
        -webkit-box-shadow: #FFF 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.0784314) 0px 1px 0px 0px;
        box-shadow: #FFF 0px 1px 0px 0px inset, rgba(0, 0, 0, 0.0784314) 0px 1px 0px 0px;
        border: 1px solid #CCC;
        color: #555;
        padding-left: 22px;
        padding-right: 22px;
    }

    .cancel:hover {
        background-color: #FAFAFA;
        border-color: #999;
        color: #222;
    }

   .submit {
        background-color: #1E8CBE;
        border: 1px solid #0074A2;
        -webkit-box-shadow: rgba(120, 200, 230, 0.6) 0px 1px 0px 0px inset;
        box-shadow: rgba(120, 200, 230, 0.6) 0px 1px 0px 0px inset;
        color: #fff;
        padding-left: 32px;
        padding-right: 32px;
   }

   .submit:hover {
        opacity: .9;
   }
</style>