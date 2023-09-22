<template>
    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
            <img src="../../../assets/images/card2.png" class="rounded-3 mx-auto d-block"
                style="height: 150px; width: 150px; object-fit: cover; object-position: top;" alt="">
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <img src="../../../assets/images/card1.png" class="rounded-3 mx-auto d-block"
                style="height: 150px; width: 150px; object-fit: cover; object-position: top;" alt="">
        </div>
        <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
            <img src="../../../assets/images/card3.png" class="rounded-3 mx-auto d-block"
                style="height: 150px; width: 150px; object-fit: cover; object-position: top;" alt="">
        </div>
    </div>
    <ul class="nav nav-pills my-3 d-flex justify-content-center align-items-center" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class=" border-0 bg-transparent  active" id="pills-home-tab" data-bs-toggle="pill"
                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">
                <img src="../../../assets/images/card1.png" class="rounded-3 mx-1"
                    style="height:55px; width:55px; object-fit: cover; object-position: top;" alt="">
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class=" border-0 bg-transparent " id="pills-profile-tab" data-bs-toggle="pill"
                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                aria-selected="false">
                <img src="../../../assets/images/card2.png" class="rounded-3 mx-1"
                    style="height:55px; width:55px; object-fit: cover; object-position: top;" alt="">
            </button>
        </li>
        <li class="nav-item" role="presentation">
            <button class=" border-0 bg-transparent " id="pills-contact-tab" data-bs-toggle="pill"
                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                aria-selected="false">
                <img src="../../../assets/images/card3.png" class="rounded-3 mx-1"
                    style="height:55px; width:55px; object-fit: cover; object-position: top;" alt="">
            </button>
        </li>
    </ul>
</template>

<script setup>

</script>

<style
 scoped>
 button.active {
     background-color: transparent !important;
 }
</style>