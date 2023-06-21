<template>
    <Head title="Home"/>
    <div class="text-white bg-brand leading-loose">
        <div
            class="relative pt-16 pb-32 flex content-center items-center justify-center min-h-screen-75"
        >
            <div
                class="absolute top-0 w-full h-full bg-center bg-cover"
                :style="{backgroundImage: 'url('+output2+')'}"
            >
                <span class="w-full h-full absolute bg-center bg-no-repeat bg-purple-700 opacity-10 bg-blend-multiply"></span>
            </div>
            <Navbar/>
            <div class="container relative mx-auto">
                <div class="items-center flex flex-wrap">
                    <div class="w-full lg:w-6/12 px-2 ml-auto mr-auto text-center">
                        <div>
                            <h1 class="text-emerald-20 font-semibold text-4xl">
                                Welcome to the future of AI
                            </h1>
                            <p class="mt-4 text-lg text-blueGray-200 font-bold">
                                The Polus Network is a platform for AI developers and
                                enthusiasts to collaborate and earn rewards for their contributions.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="top-auto bottom-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden h-70-px"
                style="transform: translateZ(0);"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="text-blue-800 fill-current"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>
        </div>
    </div>
    <main>
        <section class="pb-20 -mt-24 z-50">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap">
                    <div class="lg:pt-12 pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-purple-800 w-full mb-8 shadow-lg rounded-lg"
                        >
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-600"
                                >
                                    <i class="fas fa-award"></i>
                                </div>
                                <h6 class="text-xl text-white font-semibold">Earn Rewards</h6>
                                <p class="mt-2 mb-4 text-emerald-100">
                                    Divide details about your product or agency work into parts.
                                    A paragraph describing a feature will be enough.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-purple-800 w-full mb-8 shadow-lg rounded-lg"
                        >
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-600"
                                >
                                    <i class="fas fa-retweet"></i>
                                </div>
                                <h6 class="text-xl text-white font-semibold">Swap Tokens</h6>
                                <p class="mt-2 mb-4 text-emerald-100">
                                    Keep you user engaged by providing meaningful information.
                                    Remember that by this time, the user is curious.
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="pt-6 w-full md:w-4/12 px-4 text-center">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-purple-800 w-full mb-8 shadow-lg rounded-lg"
                        >
                            <div class="px-4 py-5 flex-auto">
                                <div
                                    class="text-white p-3 text-center inline-flex items-center justify-center w-12 h-12 mb-5 shadow-lg rounded-full bg-emerald-600"
                                >
                                    <i class="fas fa-fingerprint"></i>
                                </div>
                                <h6 class="text-xl text-white font-semibold">AI Chat & Images</h6>
                                <p class="mt-2 mb-4 text-emerald-100">
                                    Write a few lines about each one. A paragraph describing a
                                    feature will be enough. Keep you user engaged!
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex flex-wrap items-center mt-32">
                    <div class="w-full md:w-5/12 px-4 mr-auto ml-auto">
                        <div
                            class="text-blueGray-500 p-3 text-center inline-flex items-center justify-center w-16 h-16 mb-6 shadow-lg rounded-full bg-white"
                        >
                            <i class="fas fa-user-friends text-xl"></i>
                        </div>
                        <h3 class="text-3xl text-emerald-400 mb-2 font-semibold leading-normal">
                            Our Mission
                        </h3>
                        <p
                            class="text-lg font-light leading-relaxed mt-4 mb-4 text-blueGray-200"
                        >
                            The Polus Network aims to provide a platform for AI developers and enthusiasts to collaborate and earn rewards for their contributions. We believe that AI should be available to everyone completely free to explore this ecosystem and develop with it along with learning how AI works. The Polus Network uses the Proof of Concept (PoC) consensus algorithm, which is a new consensus algorithm that focuses on AI development. The PoC consensus algorithm is designed to reward users for their contributions to the network. The more contributions a user makes, the more rewards they will receive.
                        </p>
                    </div>

                    <div class="w-full md:w-4/12 px-4 mr-auto ml-auto">
                        <div
                            class="relative flex flex-col min-w-0 break-words bg-purple-900 w-full mb-6 shadow-lg rounded-lg bg-emerald-500"
                        >
                            <img
                                alt="..."
                                src="https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1051&q=80"
                                class="w-full align-middle rounded-t-lg"
                            />
                            <blockquote class="relative p-8 mb-4">
                                <svg
                                    preserveAspectRatio="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 583 95"
                                    class="absolute left-0 w-full block h-95-px -top-94-px"
                                >
                                    <polygon
                                        points="-30,95 583,95 583,65"
                                        class="text-emerald-500 fill-current"
                                    ></polygon>
                                </svg>
                                <h4 class="text-xl font-bold text-white">
                                    Staking on our Network
                                </h4>
                                <p class="text-md font-light mt-2 text-white">
                                    Right now, Polus Network provides staking pools in its governance token PLS built on BEP-20. Think of PLS as a share of Polus Network and when you buy it you become a shareholder of our company.
                                </p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="relative bg-purple-800 py-20">
            <div
                class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
                style="transform: translateZ(0);"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="text-purple-800 fill-current"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>

            <div class="container mx-auto px-4">
                <div class="items-center flex flex-wrap">
                    <div class="w-full md:w-4/12 ml-auto mr-auto px-4">
                        <img
                            alt="..."
                            class="max-w-full rounded-lg shadow-lg"
                            src="https://images.unsplash.com/photo-1555212697-194d092e3b8f?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=634&q=80"
                        />
                    </div>
                    <div class="w-full md:w-5/12 ml-auto mr-auto px-4">
                        <div class="md:pr-12">
                            <h3 class="text-3xl text-white font-semibold">How Staking Works</h3>
                            <p class="mt-4 text-lg leading-relaxed text-emerald-500">
                                Right now, Polus Network provides staking pools in its governance token PLS built on BEP-20. Think of PLS as a share of Polus Network and when you buy it you become a shareholder of our company. Afterwards you can stake this share in a pool which will be used for the future goals and betterment of Polus Network and you will continue to receive rewards along the way. It also offers a rewarding token named as BRAIN which will be used to access premium features of the network and to sustain the ecosystem. You can signup now to view all the amazing opportunities we have for you.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pt-20 pb-48">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap justify-center text-center mb-24">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl text-white font-semibold">Our Team</h2>
                        <p class="text-lg leading-relaxed m-4 text-blueGray-500">
                            According to the National Oceanic and Atmospheric
                            Administration, Ted, Scambos, NSIDClead scentist, puts the
                            potentially record maximum.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap">
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img
                                alt="..."
                                :src="team1"
                                class="shadow-lg rounded-full mx-auto max-w-120-px"
                            />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Ryan Tompson</h5>
                                <p
                                    class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                                >
                                    Web Developer
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-lightBlue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button
                                        class="bg-lightBlue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                    <button
                                        class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img
                                alt="..."
                                :src="team2"
                                class="shadow-lg rounded-full mx-auto max-w-120-px"
                            />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Romina Hadid</h5>
                                <p
                                    class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                                >
                                    Marketing Specialist
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button
                                        class="bg-lightBlue-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-facebook-f"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img
                                alt="..."
                                :src="team3"
                                class="shadow-lg rounded-full mx-auto max-w-120-px"
                            />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Alexa Smith</h5>
                                <p
                                    class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                                >
                                    UI/UX Designer
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button
                                        class="bg-lightBlue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button
                                        class="bg-blueGray-700 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-instagram"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="w-full md:w-6/12 lg:w-3/12 lg:mb-0 mb-12 px-4">
                        <div class="px-6">
                            <img
                                alt="..."
                                :src="team4"
                                class="shadow-lg rounded-full mx-auto max-w-120-px"
                            />
                            <div class="pt-6 text-center">
                                <h5 class="text-xl font-bold">Jenna Kardi</h5>
                                <p
                                    class="mt-1 text-sm text-blueGray-400 uppercase font-semibold"
                                >
                                    Founder and CEO
                                </p>
                                <div class="mt-6">
                                    <button
                                        class="bg-pink-500 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-dribbble"></i>
                                    </button>
                                    <button
                                        class="bg-red-600 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-google"></i>
                                    </button>
                                    <button
                                        class="bg-lightBlue-400 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-twitter"></i>
                                    </button>
                                    <button
                                        class="bg-blueGray-700 text-white w-8 h-8 rounded-full outline-none focus:outline-none mr-1 mb-1"
                                        type="button"
                                    >
                                        <i class="fab fa-instagram"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="pb-20 relative block bg-blueGray-800">
            <div
                class="bottom-auto top-0 left-0 right-0 w-full absolute pointer-events-none overflow-hidden -mt-20 h-20"
                style="transform: translateZ(0);"
            >
                <svg
                    class="absolute bottom-0 overflow-hidden"
                    xmlns="http://www.w3.org/2000/svg"
                    preserveAspectRatio="none"
                    version="1.1"
                    viewBox="0 0 2560 100"
                    x="0"
                    y="0"
                >
                    <polygon
                        class="text-blueGray-800 fill-current"
                        points="2560 0 2560 100 0 100"
                    ></polygon>
                </svg>
            </div>

            <div class="container mx-auto px-4 lg:pt-24 lg:pb-64">
                <div class="flex flex-wrap text-center justify-center">
                    <div class="w-full lg:w-6/12 px-4">
                        <h2 class="text-4xl font-semibold text-white">
                            Build something
                        </h2>
                        <p class="text-lg leading-relaxed mt-4 mb-4 text-blueGray-400">
                            Put the potentially record low maximum sea ice extent tihs year
                            down to low ice. According to the National Oceanic and
                            Atmospheric Administration, Ted, Scambos.
                        </p>
                    </div>
                </div>
                <div class="flex flex-wrap mt-12 justify-center">
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-blueGray-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                            <i class="fas fa-medal text-xl"></i>
                        </div>
                        <h6 class="text-xl mt-5 font-semibold text-white">
                            Excelent Services
                        </h6>
                        <p class="mt-2 mb-4 text-blueGray-400">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-blueGray-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                            <i class="fas fa-poll text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">
                            Grow your market
                        </h5>
                        <p class="mt-2 mb-4 text-blueGray-400">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                    <div class="w-full lg:w-3/12 px-4 text-center">
                        <div
                            class="text-blueGray-800 p-3 w-12 h-12 shadow-lg rounded-full bg-white inline-flex items-center justify-center"
                        >
                            <i class="fas fa-lightbulb text-xl"></i>
                        </div>
                        <h5 class="text-xl mt-5 font-semibold text-white">
                            Launch time
                        </h5>
                        <p class="mt-2 mb-4 text-blueGray-400">
                            Some quick example text to build on the card title and make up
                            the bulk of the card's content.
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <FooterComponent/>
</template>
<script setup>
import 'flowbite/dist/flowbite.css';
import output2 from '@/assets/img/mind-read-ai-image-scaled.jpg';
import Carousel from "@/Components/Carousel.vue";
import {Link} from "@inertiajs/vue3";
import Navbar from "@/Components/Navbars/AuthNavbar.vue";
import {Head} from "@inertiajs/vue3";
import FooterComponent from "@/Components/Footers/Footer.vue";
import AiFace from '@/assets/img/Ai Face path group.svg';
import team1 from "@/assets/img/team-1-800x800.jpg";
import team2 from "@/assets/img/team-2-800x800.jpg";
import team3 from "@/assets/img/team-3-800x800.jpg";
import team4 from "@/assets/img/team-4-470x470.png";
import chartbg from "@/assets/img/chart_bg.jpg";
import teambg from "@/assets/img/team_bg.jpg";
</script>
<style>
@tailwind base;
@tailwind components;
@tailwind utilities;
</style>
