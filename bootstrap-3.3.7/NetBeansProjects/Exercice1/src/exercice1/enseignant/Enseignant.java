/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercice1.enseignant;

import exercice1.IPersonne;
import exercice1.Personne;
import java.util.Date;

/**
 *
 * @author Kavota
 */
public class Enseignant  extends Personne implements IPersonne{
    private String grade, domaine;

    
    public String getGrade() {
        return grade;
    }

    public void setGrade(String grade) {
        this.grade = grade;
    }

    public String getDomaine() {
        return domaine;
    }

    public void setDomaine(String domaine) {
        this.domaine = domaine;
    }

    @Override
    public String toString(){
        return getNom()+" "+getPostnom()+"{" + "grade=" + grade + ", domaine=" + domaine + '}';
    }

    @Override
    public void salutation(Personne p) {
        System.out.println("Bonjour chers  camarades "+ p.getNom());
    }

    @Override
    public void ecrire() {
        System.out.println("Chers etudiants, je travaille sur bloc-note!!!");
    }
    
}
