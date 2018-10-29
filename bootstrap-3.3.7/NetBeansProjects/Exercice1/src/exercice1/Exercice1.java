/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercice1;

import exercice1.enseignant.Enseignant;
import exercice1.etudiant.Etudiant;

/**
 *
 * @author Kavota
 */
public class Exercice1 {

    /**
     * @param args the command line arguments
     */
    public static void main(String[] args) {
        Etudiant e=new Etudiant();
        e.setNom("Kenny");
        e.setPostnom("Uzima");
        e.setPromotion("L2 IG");
        e.setSexe("F");e.ecrire(); e.salutation(e);
        System.out.println(" Etudiant: "+e.toString());
        Enseignant en=new Enseignant();
        en.setNom("Mimy");
        en.setPostnom("Mulongo");
        en.setGrade("Docteur");
        en.setSexe("M");
        en.setDomaine("RéIngenierie Logiciel");
        System.out.println(" Enseignant: "+en.toString());
        en.ecrire();en.salutation(en);
        
    }
    
}
