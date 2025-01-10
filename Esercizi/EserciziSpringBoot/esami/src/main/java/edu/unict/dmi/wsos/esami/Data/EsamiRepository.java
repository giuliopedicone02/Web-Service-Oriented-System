package edu.unict.dmi.wsos.esami.Data;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.dmi.wsos.esami.Model.Esami;

public interface EsamiRepository extends JpaRepository<Esami, Long> {

}
