<script setup>
import PicsCard from '@/Components/slider/PicsCard.vue';
import DataShowTable from '@/Components/table/DataShowTable.vue'; 
import ProfilePost from '@/Components/profile/ProfilePost.vue'; 

</script>
<template>
     <div>
            <div class="userdashbordbar mb-4 w-100 bg-white shadow py-2 px-3 rounded-pill">
                <ul class="nav nav-pills" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 fs-18 text-primary active" id="pills-overview-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-overview" type="button" role="tab"
                            aria-controls="pills-overview" aria-selected="true">Overview</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link rounded-pill px-4 fs-18 text-primary" id="pills-profile-tab"
                            data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab"
                            aria-controls="pills-profile" aria-selected="false">Profile</button>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                    aria-labelledby="pills-overview-tab" tabindex="0">

                    <div class="row g-4">
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="overview_cards w-100 rounded-5 shadow bg-transparent" style="height: 300px;">
                                <PicsCard />
                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="news_card w-100 rounded-5 overflow-hidden shadow bg-white" style="height: 300px;">
                                <img src="../../../assets/images/newhouse.jpg" class="w-100 object-fit-cover"
                                    style="height: aut; max-height: 150px;" alt="">
                                <div class="card_body p-3 h-auto w-100">
                                    <h4 class="fw-bold mb-0 text-center">New House Event</h4>
                                    <p class="fw-normal text-center fs-16">
                                        I am so happy and proud of you for buying your new home! This is a huge milestone in
                                        your life and I am
                                        sure you will make many wonderful memories there.
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-xxl-6 col-md-12 col-12">
                            <div class="usertable_cards w-100 overflow-auto rounded-5 shadow bg-white"
                                style="height: 300px;">
                                <DataShowTable />
                            </div>
                        </div>

                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="overview_cards w-100 rounded-5 shadow bg-white" style="height: 300px;">

                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="overview_cards w-100 rounded-5 shadow bg-white" style="height: 300px;">
                                <div id="chart-container"></div>

                            </div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="overview_cards w-100 rounded-5 shadow bg-white" style="height: 300px;"></div>
                        </div>
                        <div class="col-xxl-3 col-xl-6 col-lg-6 col-md-6 col-12">
                            <div class="p-4 overview_cards w-100 rounded-5 shadow bg-white" style="height: 300px;">
                                <div class="card_title d-flex justify-content-between align-items-center">
                                    <h5>New Media</h5>
                                    <i class="bi bi-share-fill"></i>
                                </div>
                                <div class="circle_pic">
                                    <ProfilePost />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab"
                    tabindex="0">
                    <h1>User Profile</h1>
                </div>
            </div>
        </div>
</template>
