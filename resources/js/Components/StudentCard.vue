<template>
    <!-- component -->
<div class="flex justify-center relative top-1/3">

    <!-- This is an example component -->
    <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white shadow-lg mr-4"  @click="open(student)">
        <div class="relative flex gap-4">
            <img :src="student.picUrl" class="relative rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
            <div class="flex flex-col w-full">
                <div class="flex flex-row justify-between">
                    <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">{{ student.last_name }} , {{ student.first_name }}</p>
                    <a class="text-gray-500 text-xl" href="#"><i class="fa-solid fa-trash"></i></a>
                </div>
                <p class="text-gray-400 text-sm">{{ student.dob }}</p>
                <!-- <p class="text-gray-400 text-sm">{{ student.course }}  {{ student.year }}</p> -->

            </div>
        </div>
        <p class="-mt-4 text-gray-500">Email: {{ student.email }} <br>Age {{ student.age }}</p>
        <!-- <p class="-mt-4 text-gray-500">Gender: {{ student.gender }} <br>Lives in {{ student.address }}</p> -->
    </div>



    </div>
</template>

<script setup>
    import {router} from '@inertiajs/vue3';

    const props= defineProps({
        student:Object
    })

    function open(student) {
        router.visit('/students/' + student.id)
    }


    function toggleEnabled(student){
        router.visit('/students/toggle/' +student.id , {
            method:'post',
            preserveScroll:true
        })
    }
</script>
