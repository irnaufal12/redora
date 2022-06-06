            <form action="{{route('user.status-request-update', $table->id)}}" method="POST" id="editForm">
              @method('PUT')
              @csrf
              <div class="mb-3">
                <label for="golonganDarah" class="form-label">Golongan Darah Yang Dibutuhkan</label>
                <br>
                <select class="form-select" id="golonganDarah" name="golonganDarah">
                  <option selected>{{$table->gol_darah}}</option>
                  <option value="A+">A+</option>
                  <option value="A-">A-</option>
                  <option value="B+">B+</option>
                  <option value="B-">B-</option>
                  <option value="AB+">AB+</option>
                  <option value="AB-">AB-</option>
                  <option value="O+">O+</option>
                  <option value="O-">O-</option>
                </select>
              </div>
              <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{$table->kontak}}">
              </div>
              <br>

              <div class="mb-3">
                  <label for="keterangan" class="form-label">Keterangan Keperluan</label>
                  <textarea id="keterangan" rows="5" class="form-control" name="keterangan" placeholder=""></textarea>
              </div>
              <br>
              
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>