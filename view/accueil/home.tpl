{extends file='../layout/Main.tpl'}
{block name=body}

    <div class="panel panel-primary">
        <div class="panel-heading">

            <div class="form-group col-sm-3 " style="position: relative">
                <input class="form-control pull-right" type="text" placeholder="Rechercher" id="search"  />
                <i class="fa fa-search" style="position: absolute;font-size: 20px;top: 5px;right: 14px;height: 79%;" ></i>

            </div>
            <hr>
        </div>

        <div class="panel-body">
            <table class="table table-bordered table-hover table-striped" id="tabEtu">
                <thead style="background: rgb(238, 110, 115) ; color: white !important;">
                <tr >
                    <th style="color: white">Matricule</th>
                    <th style="color: white">Last Name</th>
                    <th style="color: white">First Name</th>
                    <th style="color: white">Class</th>
                    <th style="text-align: center;color: white">Action</th>
                </tr>
                </thead>
                <tbody id="tbody">
                {foreach from=$clients item=ligne}
                    <tr>
                        <td id="matetu{$ligne.idClient}" > {$ligne.nomComplet}</td>
                        <td id="matetu{$ligne.idClient}" >  {$ligne.nomComplet}</td>
                        <td id="matetu{$ligne.idClient}>" >  {$ligne.nomComplet}</td>
                        <td id="matetu{$ligne.idClient}" > {$ligne.nomComplet}</td>
                        <td style="text-align: center">
                            <button class="btn btn-success" value="<%=ligne.id%>"
                                    onclick="showNoteEut(this)"
                                    data-toggle="modal" data-target="#showNote">
                                <i class="fa fa-eye"> Note</i>
                            </button>
                            <button class="btn btn-primary" value=" {$ligne.idClient}"
                                    onclick="showediteEtu(this)"
                                    data-toggle="modal" data-target="#editEtut">
                                <i class="fa fa-edit"> Edit</i>
                            </button>
                            <button class="btn btn-warning" value=" {$ligne.idClient}" onclick="DelEtu(this)">
                                <i class="fa fa-trash"> Del</i>
                            </button>

                        </td>
                    </tr>
                {/foreach}

                </tbody>


            </table>
        </div>
        <div class="panel-footer text-center" >
            <button class="btn btn-success btn-sm" id="manualLoad">Load more</button>
        </div>
    </div>
{/block}