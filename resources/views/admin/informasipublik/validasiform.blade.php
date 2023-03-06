      <!-- Modal -->
      <div class="modal fade validasimodal" id="validasimodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLongTitle">Validasi Form Permohonan Informasi Publik</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="orderDetails" class="modal-body"></div>
            <div class="modal-body">
                
              <form class="form-valide" action="{{route('permohonan.storevalidasi')}}" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Pemohon</label>
                        <input type="text" disabled class="form-control" id="nama" name="nama" aria-describedby="emailHelp" value="{{ $data->nama_lengkap }}"/>
                        <input type="hidden" class="form-control" id="idvalidasi" name="idvalidasi" aria-describedby="emailHelp" value="{{ $data->id }}"/>
                        <small id="emailHelp" class="form-text text-muted">Catatan akan dikirimkan ke pemohon</small>
                      </div>
                  
                    <div class="form-group">
                      <label for="exampleInputEmail1">Status Form Permohonan</label>
                      <select class="form-control" name="statusform" id="statusform">
                        <option value="1">Menunggu Tindak Lanjut</option>
                        <option value="2">Proses Tindak Lanjut</option>
                        <option value="3">Selesai Tindak Lanjut</option>
                        <option value="4">Tidak bisa Ditindaklanjuti</option>
                      </select>
                      <small id="emailHelp" class="form-text text-muted">Ubah status validasi</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Catatan Admin PPID</label>
                        <textarea type="text" name="catatanvalidasi" id="catatanvalidasi" class="form-control"  aria-describedby="emailHelp" placeholder="masukkan catatan validasi admin"></textarea>
                        <small id="emailHelp" class="form-text text-muted">Catatan akan dikirimkan ke pemohon</small>
                      </div>
                  
              
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Validasi</button>
              
            </form>
            </div>
          </div>
        </div>
      </div>


   