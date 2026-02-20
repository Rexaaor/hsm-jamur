<template>
  <MainLayout>
    <div class="min-h-screen bg-gray-50 py-16 text-gray-800">
      <div class="max-w-6xl mx-auto px-6">
        <!-- DASHBOARD -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <!-- Klik Hari Ini -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Klik Hari Ini</p>
            <p class="text-3xl font-bold text-blue-600 mt-2">
            {{ dashboard.today_clicks }}
            </p>
        </div>

        <!-- Total Klik -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500">Total Klik WhatsApp</p>
            <p class="text-3xl font-bold text-green-700 mt-2">
            {{ dashboard.total_clicks }}
            </p>
        </div>

        <!-- Produk Terpopuler -->
        <div class="bg-white rounded-2xl shadow p-6">
            <p class="text-sm text-gray-500 mb-3">Produk Paling Diminati</p>
            <p class="text-lg font-semibold text-gray-800">
            {{ dashboard.top_products[0]?.nama ?? '-' }}
            </p>
            <p class="text-sm text-gray-500">
            {{ dashboard.top_products[0]?.total ?? 0 }} klik
            </p>
        </div>
        </div>

        <h1 class="text-3xl font-bold text-gray-800 mb-10">
          Kelola Produk
        </h1>

        <div class="space-y-6">
          <div
            v-for="product in products"
            :key="product.id_produk"
            class="bg-white rounded-2xl shadow-md p-6"
          >
            <form @submit.prevent="update(product)">
              <div class="grid md:grid-cols-3 gap-6 items-end">

                <!-- Nama -->
                <div>
                  <label class="block text-sm font-medium text-gray-700 mb-1">
                    Nama Produk
                  </label>
                  <input
                    v-model="product.nama_produk"
                    type="text"
                    class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
                  />
                </div>

                <!-- Harga (FOKUS UTAMA) -->
                <div>
                  <label class="block text-sm font-medium text-green-700 mb-1">
                    Harga (Rp)
                  </label>
                  <input
                    v-model.number="product.harga_produk"
                    type="number"
                    class="w-full border-2 border-green-600 rounded-lg px-4 py-3 text-lg font-semibold focus:ring-2 focus:ring-green-600 outline-none"
                  />
                </div>

                <!-- Tombol -->
                <div>
                  <button
                    type="submit"
                    class="w-full bg-green-700 text-white py-3 rounded-lg font-medium hover:bg-green-800 transition"
                  >
                    Simpan
                  </button>
                </div>
              </div>

              <!-- Deskripsi -->
              <div class="mt-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">
                  Deskripsi
                </label>
                <textarea
                  v-model="product.deskripsi_produk"
                  rows="3"
                  class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring-2 focus:ring-green-600 outline-none"
                ></textarea>
              </div>

              <p class="text-xs text-gray-500 mt-3">
                Terakhir diperbarui:
                {{ formatDate(product.updated_at) }}
              </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </MainLayout>
</template>

<script setup>
import MainLayout from '@/layouts/MainLayout.vue'
import { router, usePage } from '@inertiajs/vue3'

const { props } = usePage()

const products = props.products
const dashboard = props.dashboard

const update = (product) => {
  router.put(`/Admin/Produk/${product.id_produk}`, {
    nama_produk: product.nama_produk,
    harga_produk: product.harga_produk,
    deskripsi_produk: product.deskripsi_produk
  })
}

const formatDate = (date) => {
  if (!date) return '-'
  return new Date(date).toLocaleString('id-ID', {
    day: '2-digit',
    month: 'long',
    year: 'numeric',
    hour: '2-digit',
    minute: '2-digit'
  })
}
</script>
