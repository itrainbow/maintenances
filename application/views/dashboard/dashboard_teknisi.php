<div class="container-fluid">
    <h1 class="h3 mb-3 text-gray-800 font-weight-bold"><?= lang (line: 'dashboard_title'); ?></h1>

    <div class="row">
        <!--Pending-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-light text-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><?= lang(line:'dashboard_new_tickets');?></div>
                            <div class="h3 mb-0 font-weight-bold"><?= $tekapprove ?></div>
                            <h4 class="small font-weight-bold">&nbsp;<span></span></h4>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-success"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Need Approve-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-light text-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><?= lang('dashboard_total_tickets') ?></div>
                            <div class="h3 mb-0 font-weight-bold"><?= $tekassign ?></div>
                            <h4 class="small font-weight-bold">&nbsp;<span></span></h4>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-ticket-alt fa-2x text-primary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Proses-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-light text-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><?= lang(line: "dashboard_tickets_onprocess")?></div>
                            <div class="h3 mb-0 font-weight-bold"><?= $tekkerja ?></div>
                            <h4 class="small font-weight-bold"><?= lang(line: "dashboard_onhold")?> : <span><?= $tekpending ?></span></h4>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-circle-notch fa-2x text-warning"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--Done-->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-light text-dark shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-uppercase mb-1"><?= lang(line: "dashboard_tickets_done")?></div>
                            <div class="h3 mb-0 font-weight-bold"><?= $tekselesai ?></div>
                            <h4 class="small font-weight-bold">&nbsp;<span></span></h4>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-circle fa-2x text-secondary"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- <div class="alert alert-warning text-dark shadow mb-4" role="alert">
        <h6 class="mb-2 font-weight-bold text-gray-800">Informasi!</h6>
        <div id="carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <?php $no = 0;
                foreach ($datainformasi as $row) : $no++; ?>
                    <div class="carousel-item <?= ($no == 1 ? 'active' : ''); ?>" style="font-size: 14px;">
                        <div class="d-block mb-4">
                            <b><?= $row->subject; ?></b> -
                            <span>
                                <?= $row->nama; ?> (<?= $row->tanggal; ?>)
                            </span>
                            <p class="mb-0"><?= $row->pesan; ?>.</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <ol class="carousel-indicators mb-0">
                <?php
                for ($i = 0; $i < $jmldatainformasi; $i++) {
                    echo '<li data-target="#carousel" data-slide-to="' . $i . '"';
                    if ($i == 0) {
                        echo 'class="active"';
                    }
                    echo '></li>';
                } ?>
            </ol>
        </div>
    </div> -->

    <div class="row">
        <div class="col-xl-12 col-lg-12">
            <!-- Bar Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-gray-800"><?= lang(line: "dashboard_new_tickets_title")?> (<?= $jmltugas ?>)</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive-sm">
                        <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th><?= lang(line: "dashboard_table_number")?></th>
                                    <th><?= lang(line: "dashboard_table_number_tickets")?></th>
                                    <th><?= lang(line: "dashboard_table_priority")?></th>
                                    <th><?= lang(line: "dashboard_table_date")?></th>
                                    <th><?= lang(line: "dashboard_table_deadline")?></th>
                                    <th><?= lang(line: "dashboard_table_user")?></th>
                                    <th><?= lang(line: "dashboard_table_department")?></th>
                                    <th><?= lang(line: "dashboard_table_status")?></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($datatickettek as $row) { ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><a href="<?= site_url('ticket_teknisi/detail_approve/' . $row->id_ticket) ?>" class="font-weight-bold" title="Detail"><?= $row->id_ticket ?></a></td>
                                        <?php if ($row->id_prioritas == 0) { ?>
                                            <td><?= lang(line: "dashboard_not_set_yet")?></td>
                                        <?php } else { ?>
                                            <td style="color: <?= $row->warna ?>"><?= $row->nama_prioritas ?></td>
                                        <?php } ?>
                                        <td><?= $row->tanggal ?></td>
                                        <td><?= $row->deadline ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td><?= $row->nama_sub_kategori ?></td>
                                        <?php if ($row->status == 3) { ?>
                                             <td>
                                                <strong style="color: #A2B969;"><?= lang(line: "dashboard_table_tickets_assigned")?></strong>
                                            </td>
                                        <?php } else if ($row->status == 4) { ?>
                                            <td>
                                                <strong style="color: #0D95BC;"><?= lang(line: "dashboard_table_tickets_on_process")?></strong>
                                            </td>
                                        <?php } else if ($row->status == 5) { ?>
                                            <td>
                                                <strong style="color: #2E6095;"><?= lang(line: "dashboard_table_tickets_solved")?></strong>
                                            </td>
                                        <?php } else if ($row->status == 6) { ?>
                                            <td>
                                                <strong style="color: #2E6095;">Solve</strong>
                                            </td>
                                        <?php } else if ($row->status == 7) { ?>
                                            <td>
                                                <strong style="color: #2E6095;"><?= lang(line: "dashboard_table_tickets_solved")?></strong>
                                            </td>
                                        <?php } ?>
                                    </tr>
                                <?php $no++;
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>