<div class="modal fade" tabindex="-1" role="dialog"  id="editModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Edit Data</h5>
            <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
        <div class="modal-body">
            <form action="{{URL::to('/registration')}}" method="post"  enctype="multipart/form-data">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" id="edit-id">
                <fieldset class="form-group mb-2">
                    <label for="edit-name">Nama Lengkap</label>
                    <input type="text" max="255" class="form-control" name="name" id="edit-name" required placeholder="Nama">
                </fieldset>
                <fieldset class="form-group mb-2">
                    <label for="exampleInputTextarea">Alamat Lengkap</label>
                    <textarea name="address" class="form-control" id="edit-address" rows="5"></textarea>
                </fieldset>
                <fieldset class="form-group mb-2">
                    <label for="exampleInputHighSchool">Asal Sekolah</label>
                    <input type="text" max="255"  class="form-control" name="junior_high_school" id="edit-junior-high-school" required placeholder="Asal Sekolah">
                </fieldset>
                <fieldset class="form-group mb-2">
                    <label for="jk">Jenis Kelamin</label>
                    <div class="form-check">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="edit-male-check" value="Laki-Laki" checked="">
                        Laki-Laki
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <label class="form-check-label">
                        <input type="radio" class="form-check-input" name="gender" id="edit-female-check" value="Perempuan">
                        Perempuan
                        </label>
                    </div>
                </fieldset>
                <fieldset class="form-group mb-2">
                    <label for="edit-religion" class="form-label">Agama</label>
                    <select class="form-select form-control" name="religion" id="edit-religion" required>
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Kong Hu Chu">Kong Hu Chu</option>
                    </select>
                </fieldset>
                <fieldset class="form-group mb-2">
                    <label for="edit-major" class="form-label">Jurusan</label>
                    <select class="form-select form-control" name="major" id="edit-major" required>
                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                        <option value="Tata Boga">Tata Boga</option>
                        <option value="Tata Busana">Tata Busana</option>
                        <option value="Multimedia">Multimedia</option>
                    </select>
                </fieldset>

        </div>
        <div class="modal-footer d-flex justify-content-between">
            <div>
                <button type="button" class="btn btn-danger" onclick="showDelete()">Hapus</button>
            </div>
            <div class="d-flex ">
                <div>
                    <button type="button" class="btn btn-secondary mr-2" data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            </form>
        </div>
        </div>
    </div>
</div>
