<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link, router } from '@inertiajs/vue3';
import { useForm } from '@inertiajs/vue3';

const form =  useForm({
    last_name: null,
    first_name: null,
    age: 0,
    gender: null,
    email:null,
    course:null,
    year:null,
    pic:null,
    address:null,
    dob: null

})

function submit() {
    form.post('/students/');
}

</script>

<template>
    <AppLayout title="Students">
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Create Student</h2>
                
            </div>
        </template>
        <div class="py-8 w-[400px] mx-auto px-4 rounded bg-white mt-8 shadow">

            <form @submit.prevent="submit">
                <div class="flex flex-col mb-3">
                    <label for="last_name">Last Name</label>
                    <input type="text" id="last_name" v-model="form.last_name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="first_name">First Name</label>
                    <input type="text" id="first_name" v-model="form.first_name" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
                </div>
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[35%]">
                        <label for="age">Age</label>
                        <input type="number" id="age" v-model="form.age" class="h-full border-gray-400 rounded text-center" />
                        <div class="text-red-600" v-if="form.errors.age">{{ form.errors.age }}</div>
                    </div>
                    <!-- <div class="flex flex-col mb-3 w-55%">
                        <label for="gender" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an Gender</label>
                        <select id="gender" class="bg-gray-50 border border-gray-300 text-black-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                            <option selected>Choose a Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    <div class="text-red-600" v-if="form.errors.gender">{{ form.errors.gender }}</div>
                    </div> -->
                    <div class="px-5 py-5">
                        <label class="font-semibold text-sm text-gray-600  block" for="gender">Supplier</label>
                        <select name="" id="gender" v-model="form.gender" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 ">
                            <option value="" disabled>Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <!-- <input type="text" class="border rounded-lg px-3 py-2 mt-1 mb-5 text-sm w-full text-gray-600 " v-model="form.name"/> -->
                        <div class="text-red-600" v-if="form.errors.gender">{{ form.errors.gender }}</div>
                    </div>
                </div>

                <div class="flex flex-col mb-3">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" v-model="form.dob" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.dob">{{ form.errors.dob }}</div>
                </div>
                  
                <div class="flex flex-col mb-3">
                    <label for="address">Address</label>
                    <input type="text" id="address" v-model="form.address" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.address">{{ form.errors.address }}</div>
                </div>
                <div class="flex flex-col mb-3">
                    <label for="email">Email</label>
                    <input type="text" id="email" v-model="form.email" class="h-full border-gray-400 rounded" />
                    <div class="text-red-600" v-if="form.errors.email">{{ form.errors.email }}</div>
                </div>
                
                <div class="flex justify-between">
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="course">Course</label>
                        <input type="text" step="0.01" id="course" v-model="form.course" class="h-full border-gray-400 rounded text-right" />
                        <div class="text-red-600" v-if="form.errors.course">{{ form.errors.course }}</div>      
                    </div>
                    <div class="flex flex-col mb-3 w-[45%]">
                        <label for="year">Year</label>
                        <input type="number" id="year" v-model="form.year" class="h-full border-gray-400 rounded text-center" />
                        <div class="text-red-600" v-if="form.errors.year">{{ form.errors.year }}</div>
                    </div>  
                </div>

                <div class="flex flex-col mb-3">
                    <label for="pic">Student Picture</label>
                    <input type="file" @input="form.pic = $event.target.files[0]" class="h-full border-gray-400 rounded text-center" accept="image/jpeg" />
                    <progress v-if="form.progress" :value="form.progress.percentage" max="100">
                        {{ form.progress.percentage }}%
                    </progress>
                </div>
                <button class="px-4 py-2 bg-blue-200 w-full rounded border border-blue-300 shadow hover:bg-white">
                    Create Student
                </button>
            </form>

        </div>
    </AppLayout>
</template>
