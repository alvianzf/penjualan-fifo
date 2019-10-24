<div class="migrate-box">
    <div class="information">
    <div class="header">
        Migration Info:
    </div>
        <div class="center-text">
            <h4>Migrated to: version </h4><?= $version ?>
        </div>
    </div>
</div>

<style>
.migrate-box {
    text-align: center;
    align: center;
    height: 100%;
    margin: auto;
    padding: 40px;
}

.information {
    text-align: center;
    border: 1px solid gray;
    width: 30%;
    height: 10%;
    background-color: white;
    margin: auto;
    vertical-align: middle;
    display: block;
    position: relative;
    /* padding: 30px; */
}

.header {
    background-color: #690700;
    top: 0px;
    left: 0px;
    display: block;
    padding: 10px;
    color: white;
}

.center-text {
    text-align: center;
    vertical-align: middle;
    position: absolute;
    margin: 0;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
</style>