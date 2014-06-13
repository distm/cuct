<div class="widget">
    <div class="widget-header">
        <div class="widget-title">Simulasi Pinjaman</div>
    </div>
    <div class="widget-body">
        <form method="post">
            <div class="form-group">
                <label>Jumlah Pinjaman (Rp.)</label>
                <input class="form-control" type="text" />
            </div>
            <div class="form-group">
                <label>Besaran Balas Jasa (%)</label>
                <select class="use-select2" name="percent">
                    <!-- 
                    <option value="0.80|T">0,80% Tetap</option>
                    <option value="0.90|T">0,90% Tetap</option>
                    <option value="1.03|T">1,03% Tetap</option>
                    -->
                    <option value="1.25|M">1,25% Menurun</option>
                    <option value="1.80|M">1,80% Menurun</option>
                    <option value="1.90|M">1,90% Menurun</option>
                </select>
            </div>
            <div class="form-group">
                <label>Lama Angsuran (Bulan)</label>
                <input class="form-control" type="text" />
            </div>
            <button type="submit" class="btn btn-danger">Hitung</button>
        </form>
    </div>
</div>