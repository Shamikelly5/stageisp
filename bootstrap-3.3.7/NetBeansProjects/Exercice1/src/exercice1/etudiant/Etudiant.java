/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package exercice1.etudiant;

import exercice1.IPersonne;
import exercice1.Personne;
import java.util.Date;

/**
 *
 * @author Kavota
 */
public class Etudiant extends Personne implements IPersonne{
    private String nMatr;   
    private String promotion;
    
    
    public String getnMatr() {
        return nMatr;
    }

    public void setnMatr(String nMatr) {
        this.nMatr = nMatr;
    }
    
    public String getPromotion() {
        return promotion;
    }

    public void setPromotion(String promotion) {
        this.promotion = promotion;
    }
    public String toString(){
       return getNom()+" " +getPostnom()+" "+getnMatr()+" "+getPromotion();
    }

    @Override
    public void salutation(Personne p) {
        System.out.println("Bonjour mon chere Enseignant "+p.getNom());
      }

    @Override
    public void ecrire() {
        System.out.println("J'écris dans mon cahier Papa Prof!");
    }
}
