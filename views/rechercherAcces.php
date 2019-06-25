<?PHP
session_start();

require_once('../config.php');

if(isset($_GET['search'])){
    $sql = "SELECT * FROM acces a inner join dossier d on a.id_dossier = d.id WHERE a.id_user = :id_user ORDER BY a.dateajout DESC LIMIT 10";
        $db = config::getConnexion();
        try {
            $search  = $db->prepare($sql);
            $search->bindValue(':nom', $_GET['search']."%");
            $search->execute();
            return $search;
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
}
?>
<section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
                <div class="table100 ver1 m-b-110">
					<table data-vertable="ver1">
                        <thead>
							<tr class="row100 head">
								<th class="column100 column1" data-column="column1"></th>
								<th class="column100 column2" data-column="column2">Lecture</th>
								<th class="column100 column3" data-column="column3">Ecriture</th>
								<th class="column100 column4" data-column="column4">Suppression</th>
							</tr>
                        </thead>
                        <tbody>
                        <?PHP 
                            if(isset($_GET['search'])) 
                            {
                                foreach($search as $row)
                                {
                        ?>
                            <tr class="row100">
								<td class="column100 column1" data-column="column1"><b><?PHP echo $dossierC1->recupererAdresseDossier($row['sur_dossier']) ."/". $row['nom'] ?></b></td>
								<td class="column100 column2" data-column="column2"><?PHP echo $row['lecture'] ?></td>
								<td class="column100 column3" data-column="column3"><?PHP echo $row['ecriture'] ?></td>
								<td class="column100 column4" data-column="column4"><?PHP echo $row['suppression'] ?></td>
							</tr>
                        <?PHP
                                }
                            }
                            else {
                                echo "Aucun résultat trouvé ";
                            }
                        ?>
						</tbody>
					</table>
                </div>
            </div>
		</div>
	</div>
    </section>