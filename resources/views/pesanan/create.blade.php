@extends('admin.admin_master')

@section('title', 'Buat Pesanan')

@section('admin.index')
<section class="content">
    <div class="row">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Pilih Produk</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <!-- List of products with Add to Checkout button -->
                        @forelse ($barangs as $barang)
                            <div class="col-md-4 mb-2">
                                <div class="product-item">
                                    <img src="{{ asset('uploads/'.$barang->gambar) }}" alt="{{ $barang->nama_barang }}"
                                        class="img-thumbnail" style="max-width: 100px; max-height: 100px;">
                                    <p>Nama Barang: {{ $barang->nama_barang }}</p>
                                    <p>Harga: {{ $barang->harga }}</p>
                                    <div class="input-group">
                                        <input type="number" class="form-control qty-input" value="1" min="1" id="qty{{ $barang->id }}">
                                        <div class="input-group-append">
                                            <button class="btn btn-success add-to-checkout"
                                                data-id="{{ $barang->id }}"
                                                data-name="{{ $barang->nama_barang }}"
                                                data-price="{{ $barang->harga }}"><i class="fa fa-plus"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p>Tidak ada produk yang tersedia.</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Keranjang</h3>
                </div>
                <div class="card-body" id="checkout-items">
                    <!-- Checkout items will be dynamically added here -->
                </div>

                <!-- Buyer selection -->
                <div class="form-group">
                    <label class="col-sm-6 label-control">Nama Pelanggan :</label>
                    <div class="col-sm-12">
                        <select class="form-control" id="buyer-selection">
                            @foreach ($pembelis as $pembeli)
                                <option value="{{ $pembeli->id }}">{{ $pembeli->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Tanggal Pesan -->
                <div class="form-group">
                    <label class="col-sm-6 label-control">Tanggal Pesan:</label>
                    <div class="col-sm-12">
                        <input type="date" class="form-control" id="tgl_pesan" name="tgl_pesan" required>
                    </div>
                </div>

                <!-- Metode Pembayaran -->
                <div class="form-group">
                    <label class="col-sm-2 label-control">Metode</label>
                    <div class="col-sm-12">
                        <select name="metode" class="form-control" required>
                            <option value="cash">Cash</option>
                            <option value="ovo">Ovo</option>
                            <option value="dana">Dana</option>
                        </select>
                    </div>
                </div>

                <!-- Perhitungan -->
                <div class="col-sm-12">
                    <strong>Total Harga:</strong> <span id="total-amount">0</span>
                    <br>
                    <strong>Diskon:</strong> <span id="discount">0</span>
                    <br>
                    <strong>Total yang Harus Dibayar:</strong> <span id="total-to-pay">0</span>
                </div>

                <!-- Hidden inputs for data pesanan -->
                <input type="hidden" name="id_barangs" id="id_barangs">
                <input type="hidden" name="qtys" id="qtys">
                <input type="hidden" name="total_to_pay" id="total_to_pay_input">

                <!-- Cetak Pesanan button -->
                <a target="_blank" href="{{ route('cetak_pesanan') }}" class="btn btn-primary float-left mt-3 checkout-button" id="generate-pdf">Cetak Pesanan<i class="fa fa-cart-arrow-down"></i></a>

                <!-- Form submission buttons -->
                <div class="card-footer">
                    <button type="submit" class="btn btn-success">Submit</button>
                    <button type="reset" class="btn btn-danger float-right">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script>
    $(document).ready(function() {
        var selectedProducts = [];

        // Add to Checkout button click event
        $(".add-to-checkout").on("click", function() {
            var productId = $(this).data("id");
            var productName = $(this).data("name");
            var productPrice = $(this).data("price");

            // Find the selected product by ID
            var selectedProduct = selectedProducts.find(function(product) {
                return product.id === productId;
            });

            // If the product is not already in the checkout, add it
            if (!selectedProduct) {
                selectedProducts.push({
                    id: productId,
                    name: productName,
                    price: productPrice,
                    qty: 1  // Default quantity
                });

                // Update the checkout items display
                updateCheckoutItems();
            } else {
                // If the product is already in the checkout, increment the quantity
                selectedProduct.qty++;
                updateCheckoutItems();
            }
        });

        // Reduce Qty button click event for each item
        $(document).on("click", ".reduce-qty-item", function() {
            var productId = $(this).data("id");
            var selectedProduct = selectedProducts.find(function(product) {
                return product.id === productId;
            });

            // If the product is in the checkout, reduce the quantity
            if (selectedProduct) {
                selectedProduct.qty--;
                if (selectedProduct.qty === 0) {
                    // If quantity becomes 0, remove the product from the array
                    selectedProducts.splice(selectedProducts.indexOf(selectedProduct), 1);
                }
                // Update the checkout items display
                updateCheckoutItems();
            }
        });

        // Remove Item button click event for each item
        $(document).on("click", ".remove-item", function() {
            var productId = $(this).data("id");
            var selectedProduct = selectedProducts.find(function(product) {
                return product.id === productId;
            });

            // If the product is in the checkout, remove it
            if (selectedProduct) {
                selectedProducts.splice(selectedProducts.indexOf(selectedProduct), 1);
                // Update the checkout items display
                updateCheckoutItems();
            }
        });

        // Modify Proceed to Transaction button click event
        $(".proceed-to-transaction").on("click", function() {
            // Extract selected products data
            var selectedProductsData = selectedProducts.map(function(product) {
                return {
                    id: product.id,
                    name: product.name,
                    price: product.price,
                    qty: product.qty
                };
            });

            // Set the products data to the hidden input fields
            $("#id_barangs").val(JSON.stringify(selectedProductsData.map(p => p.id)));
            $("#qtys").val(JSON.stringify(selectedProductsData.map(p => p.qty)));

            // Set the total to pay to the hidden input field
            $("#total_to_pay_input").val($("#total-to-pay").text());
        });

        // Generate PDF button click event
        $("#generate-pdf").on("click", function() {
            // Add code to open the PDF view with the selected data
            var buyer = $("#buyer-selection option:selected").text();
            var date = $("#tgl_pesan").val();

            // Example URL structure, adjust it based on your routes
            var pdfUrl = "{{ route('cetak_pesanan') }}?buyer=" + encodeURIComponent(buyer) + "&date=" + encodeURIComponent(date);

            // Open the PDF view in a new tab
            window.open(pdfUrl, '_blank');
        });

        // Function to update the Checkout items display
        function updateCheckoutItems() {
            var checkoutItemsHtml = "";
            var totalAmount = 0;

            selectedProducts.forEach(function(product) {
                var totalPrice = product.qty * product.price;
                checkoutItemsHtml += `
                    <div>
                        ${product.name} - Harga: ${product.price} - Qty: ${product.qty} - Total: ${totalPrice}
                        <button class="btn btn-warning reduce-qty-item m-2" data-id="${product.id}"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-danger remove-item" data-id="${product.id}"><i class="fa fa-trash"></i></button>
                    </div>`;
                totalAmount += totalPrice;
            });

            // Update the HTML of the checkout items container
            $("#checkout-items").html(checkoutItemsHtml);

            // Update the total amount
            $("#total-amount").text(totalAmount);

            // Apply discounts based on total amount
            var discount = 0;
            if (totalAmount > 200000) {
                discount = 0.1; // 10% discount for total amount > 200000
            } else if (totalAmount > 100000) {
                discount = 0.05; // 5% discount for total amount > 100000
            }

            // Calculate discounted amount
            var discountedAmount = totalAmount * discount;

            // Update the discount display
            $("#discount").text(discountedAmount);

            // Calculate total to pay (total amount - discount)
            var totalToPay = totalAmount - discountedAmount;

            // Update the total to pay display
            $("#total-to-pay").text(totalToPay);
        }
    });
</script>
@endsection
